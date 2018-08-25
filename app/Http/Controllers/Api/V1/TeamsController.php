<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Auth;

class TeamsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Team::orderBy('title')->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'data' => [
                'users' => User::orderBy('name')->get(),
            ]
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
        $team = Auth::user()->teams()->create($req);
        if($team->users()->sync($req['users'])) {
            return response()->json([
                'data' => [
                    'message' => trans('messages.success'),
                ]
            ]);
        }else {
            return response()->json([
                'error' => [
                    'message' => trans('messages.error'),
                ]
            ]);
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
        return response()->json([
            'data' => [
                'team' => Team::findOrFail($id),
                'users' => User::orderBy('name')->get(),
            ]
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
        $team = Team::findOrFail($id);
        $req = $request->all();
        $team->update($req);
        if($team->users()->sync($req['users'])) {
            return response()->json([
                'data' => [
                    'message' => trans('messages.success'),
                ]
            ]);
        }else {
            return response()->json([
                'error' => [
                    'message' => trans('messages.error'),
                ]
            ]);
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
        $team = Team::findOrFail($id);
        if($team->delete()) {
            return response()->json([
                'data' => [
                    'message' => trans('messages.success'),
                ]
            ]);
        }else {
            return response()->json([
                'error' => [
                    'message' => trans('messages.error'),
                ]
            ]);
        }
    }
}
