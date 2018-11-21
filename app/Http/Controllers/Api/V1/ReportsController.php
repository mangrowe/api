<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\User;
use App\Models\Team;
use App\Models\Organization;

class ReportsController extends Controller
{
    /**
     * Reports board.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $organization = Organization::findOrFail($request->input('organization_id'));
        if($request->has('user_id')) {
            return response()->json([
                'user' => User::with('objectives')->with('keyResults')->findOrFail($request->input('user_id')),
            ]);
        }else {
            return response()->json([
                'user' => User::with('objectives')->with('keyResults')->findOrFail(Auth::user()->id),
                'users' => $organization->users,
            ]);
        }
    }

    /**
     * Reports for teams.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function teams(Request $request)
    {
        if($request->has('teams_id')) {
            return response()->json([
                'teams' => Team::where('organization_id', $request->input('organization_id'))
                    ->whereIn('id', explode(',', $request->input('teams_id')))
                    ->with('objectives')
                    ->with('users')->get(),
            ]);
        }else {
            return response()->json([
                'teams' => Team::where('organization_id', $request->input('organization_id'))
                    ->with('objectives')
                    ->with('users')->get(),
            ]);
        }
    }

    /**
     * Reports users.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function users(Request $request)
    {
        if($request->has('users_id')) {
            return response()->json([
                'users' => User::orderBy('name')->select('id', 'name', 'email')
                    ->whereIn('id', explode(',', $request->input('users_id')))
                    ->with('objectives')
                    ->with('keyResults')
                    ->get(),
            ]);
        }else {
            return response()->json([
                'users' => User::orderBy('name')->select('id', 'name', 'email')
                    ->with('objectives')
                    ->with('keyResults')
                    ->get(),
            ]);
        }
    }
}
