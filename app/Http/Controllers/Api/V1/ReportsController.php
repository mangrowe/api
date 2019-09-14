<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\User;
use App\Models\Team;
use App\Models\Organization;
use App\Models\Objective;

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
                    ->whereIn('teams.id', explode(',', $request->input('teams_id')))
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
                    ->with('teams')
                    ->get(),
                'teams' => Team::where('organization_id', $request->input('organization_id'))->get(),
            ]);
        }else {
            return response()->json([
                'users' => User::join('organization_user', 'users.id', '=', 'organization_user.user_id')
                    ->orderBy('users.name')
                    ->with('objectives')
                    ->with('keyResults')
                    ->with('teams')
                    ->where('organization_user.organization_id', $request->input('organization_id'))
                    ->select('users.id', 'users.name', 'users.email')
                    ->get(),
                'teams' => Team::where('organization_id', $request->input('organization_id'))->get(),
            ]);
        }
    }

    /**
     * Reports objectives.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function objectives(Request $request)
    {
        return response()->json([
            'objectives' => Objective::where('organization_id', $request->input('organization_id'))->get(),
        ]);
    }
}
