<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Objective;
use App\Models\User;
use App\Models\Team;
use App\Models\Cycle;
use App\Models\Organization;
use App\Models\Tag;
use App\Models\Department;

class ObjectivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('quest')) {
            $objective = new Objective();
            return Objective::where('organization_id', $request->input('organization_id'))
            ->where($objective->search($request->all()))
            ->with('cycle')->latest()->get();
        }
        return Objective::where('organization_id', $request->input('organization_id'))->with('cycle')->latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $organization = Organization::findOrFail($request->input('organization_id'));
        return response()->json([
            'objectives' => $organization->objectives()->latest()->get(),
            'users' => $organization->users()->orderBy('name')->get(),
            'teams' => $organization->teams()->orderBy('title')->get(),
            'cycles' => $organization->cycles()->latest()->get(),
            'departments' => $organization->departments()->orderBy('title')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $req = $request->all();
        $objective = Objective::create($req);
        if($objective) {
            if($req['tags']) {
                $tags = [];
                for($i = 0; $i < count($req['tags']); $i++) {
                    $tag = Tag::firstOrCreate([
                        'organization_id' => $req['organization_id'], 
                        'title' => $req['tags'][$i]
                    ]);
                    $tags[]  = $tag->id;
                }
                $objective->tags()->sync($tags);
            }
            return response()->json([
                'objective' => $objective,
                'message' => trans('messages.success')
            ]);
        }else {
            return response()->json([
                'message' => trans('messages.error')
            ], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Objective::with('keyResults')->findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $objective = Objective::findOrFail($id);
        $organization = Organization::findOrFail($request->input('organization_id'));
        return response()->json([
            'objective' => $objective,
            'objectives' => $organization->objectives()->latest()->get(),
            'users' => $organization->users()->orderBy('name')->get(),
            'teams' => $organization->teams()->orderBy('title')->get(),
            'cycles' => $organization->cycles()->latest()->get(),
            'departments' => $organization->departments()->orderBy('title')->get(),
            'tags' => $objective->tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $req = $request->all();
        $objective = Objective::findOrFail($id);
        if($objective->update($request->all())) {
            $tags = [];
            for($i = 0; $i < count($req['tags']); $i++) {
                $tag = Tag::firstOrCreate([
                    'organization_id' => $req['organization_id'], 
                    'title' => $req['tags'][$i]
                ]);
                $tags[]  = $tag->id;
            }
            $objective->tags()->sync($tags);
            return response()->json([
                'message' => trans('messages.success'),
            ]);
        }else {
            return response()->json([
                'message' => trans('messages.error'),
            ], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $objective = Objective::findOrFail($id);
        if($objective->delete()) {
            return response()->json([
                'message' => trans('messages.success'),
            ]);
        }else {
            return response()->json([
                'message' => trans('messages.error'),
            ], 400);
        }
    }

    /**
     * Clone an objective and their related key results.
     *
     * @see https://stackoverflow.com/questions/23895126/clone-an-eloquent-object-including-all-relationships#32775847
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cloner($id)
    {
        $objective = Objective::findOrFail($id);
        $objectiveNew = $objective->replicate();
        $objectiveNew->push();
        $objective->relations = [];
        $objective->load('keyResults');
        $relations = $objective->getRelations();
        $objectiveNew->tags()->sync($objective->tags->pluck('id'));
        foreach($relations as $relation) {
            foreach ($relation as $relationRecord) {
                $newRelationship = $relationRecord->replicate();
                $newRelationship->objective_id = $objectiveNew->id;
                $newRelationship->push();
            }
        }
        if($objectiveNew->id) {
            return response()->json([
                'objective' => $objectiveNew,
                'message' => trans('messages.success'),
            ]);
        }else {
            return response()->json([
                'message' => trans('messages.error'),
            ], 400);
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        $cycles = Cycle::where('organization_id', $request->input('organization_id'))->latest()->get();
        $departments = Department::where('organization_id', $request->input('organization_id'))->orderBy('title')->get();
        if($request->has('quest')) {
            $objective = new Objective();
            return response()->json([
                'objectives' => Objective::where('organization_id', $request->input('organization_id'))
                ->where($objective->search($request->all()))
                ->with('cycle')->with('user:id,name')->with('team')->get(),
                'cycles' => $cycles,
                'departments'=> $departments,
            ]);
        }
        return response()->json([
            'objectives' => Objective::where('organization_id', $request->input('organization_id'))->with('cycle')->with('user:id,name')->with('team')->get(),
            'cycles' => $cycles,
            'departments'=> $departments,
        ]);
    }
}
