<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

use App\Models\User;
use App\Models\Team;

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
        if($request->has('user_id')) {
            return response()->json([
                'user' => User::with('objectives')->with('keyResults')->findOrFail($request->input('user_id')),
            ]);
        }else if($request->has('team_id')){
            return response()->json([
                'team' => Team::with('objectives')->findOrFail($request->input('team_id')),
            ]);
        }else {
            return response()->json([
                'user' => User::with('objectives')->with('keyResults')->findOrFail(Auth::user()->id),
            ]);
        }
    }
}
