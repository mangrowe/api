<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\KeyResult;
use App\Models\Objective;
use App\Models\User;

class KeyResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return KeyResult::latest()->get();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return response()->json([
            'objectives' => Objective::latest()->get(),
            'users' => User::orderBy('name')->get()
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return KeyResult::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $keyResult = KeyResult::findOrFail($id);
        return response()->json([
            'keyResults' => $keyResult,
            'objectives' => Objective::latest()->get(),
            'users' => User::orderBy('name')->get()
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
