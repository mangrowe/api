<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeyResult;
use App\Models\Objective;
use App\Models\User;
use App\Models\Organization;

class KeyResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return KeyResult::where('organization_id', $request->input('organization_id'))->latest()->get();
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
        if($req['type'] == KeyResult::TYPES['boolean']) {
            $req['initial'] = 0;
            $req['target'] = 100;
        }
        $req['done'] = $req['current'] >= $req['target'] ? true : false;
        if(KeyResult::create($req)) {
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $keyResult = KeyResult::where('organization_id', $request->input('organization_id'))->with('objective')->with('user')->findOrFail($id);
        return response()->json([
            'keyResult' => $keyResult,
            'department' => $keyResult->objective->department->title,
        ]);
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
        $keyResult = KeyResult::findOrFail($id);
        $organization = Organization::findOrFail($request->input('organization_id'));
        return response()->json([
            'keyResults' => $keyResult,
            'objectives' => $organization->objectives()->latest()->get(),
            'users' => $organization->users()->orderBy('name')->get(),
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
        $keyResult = KeyResult::findOrFail($id);
        $req = $request->all();
        if($req['type'] == KeyResult::TYPES['boolean']) {
            $req['criteria'] = null;
            $req['format'] = null;
        }
        $req['done'] = $req['current'] >= $req['target'] ? true : false;
        if($keyResult->update($req)) {
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keyResult = KeyResult::findOrFail($id);
        if($keyResult->delete()) {
            return response()->json([
                'message' => trans('messages.success')
            ]);
        }else {
            return response()->json([
                'message' => trans('messages.error')
            ], 400);
        }
    }
}
