<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Models\Objective;
use App\Models\KeyResult;
use App\Models\User;
use App\Models\Organization;
use App\Http\Requests\UserRequest;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return User::orderBy('name')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $req = $request->all();
        $req['password'] = strlen($req['password']) > 4 ? bcrypt($req['password']) : $user->password;
        $user = User::create($req);
        if($user) {
            $user->organizations()->sync($req['organization_id']);
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json([
            'user' => User::findOrFail($id),
            'associations' => $user->organizations,
            'organizations' => Organization::orderBy('title')->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $req = $request->all();
        $req['password'] = strlen($req['password']) > 4 ? bcrypt($req['password']) : $user->password;
        if(isset($req['associations'])) {
            $user->organizations()->sync($req['associations']);
        }
        if($user->update($req)) {
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
        $user = User::findOrFail($id);
        if($user->delete()) {
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
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        return $this->edit(Auth::guard('api')->user()->id);
    }
}
