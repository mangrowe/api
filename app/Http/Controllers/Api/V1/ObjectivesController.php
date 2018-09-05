<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Objective;
use App\Models\User;
use App\Models\Team;
use App\Models\Cycle;
use App\Models\Organization;

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
        if(Objective::create($req)) {
            return response()->json([
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
        return Objective::findOrFail($id);
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
        $objective = Objective::findOrFail($id);
        if($objective->update($request->all())) {
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
}
