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
                'user' => User::findOrFail($request->input('user_id'))->with('objectives')->with('keyResults')->get(),
            ]);
        }else if($request->has('team_id')){
            return response()->json([
                'team' => Team::findOrFail($request->input('team_id'))->with('objectives')->get(),
            ]);
        }else {
            return response()->json([
                'user' => User::findOrFail(Auth::user()->id)->with('objectives')->with('keyResults')->get(),
            ]);
        }
    }
}
