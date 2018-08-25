<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Objective;
use App\Models\KeyResult;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        $user = Auth::guard('api')->user();
        return response()->json([
            'data' => [
                'user' => $user->toArray(),
                'organizations' => $user->organizations->toArray(),
                'teams' => $user->teams->toArray(),
                'objectives' => Objective::where('user_id', $user->id)->latest()->take(10)->get(),
                'key_results' => KeyResult::where('user_id', $user->id)->latest()->take(10)->get(),
            ],
        ]);
    }
}
