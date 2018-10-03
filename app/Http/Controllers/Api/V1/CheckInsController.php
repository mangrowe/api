<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CheckIn;
use App\Models\KeyResult;
use Auth;

class CheckInsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return response()->json([
            'checkIns' => CheckIn::where('key_result_id', $request->input('key_result_id'))->with('user')->latest()->get(),
            'keyResults' => KeyResult::findOrFail($request->input('key_result_id')),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return KeyResult::findOrFail($request->input('key_result_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $keyResult = KeyResult::findOrFail($request->input('key_result_id'));
        $req = $request->all();
        $req['user_id'] = Auth::guard('api')->user()->id;
        $done = $req['current'] >= $keyResult->target ? true : false;
        $keyResult->update(['current' => $request->input('current'), 'done' => $done]);
        if(CheckIn::create($req)) {
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
        return CheckIn::findOrFail($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $checkIn = CheckIn::findOrFail($id);
        return response()->json([
            'checkIn' => $checkIn,
            'keyResult' => $checkIn->keyResult,
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
        $checkIn = CheckIn::findOrFail($id);
        $keyResult = $checkIn->keyResult;
        $req = $request->all();
        $done = $req['current'] >= $keyResult->target ? true : false;
        $keyResult->update(['current' => $request->input('current'), 'done' => $done]);
        if($checkIn->update($req)) {
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
        $checkIn = CheckIn::findOrFail($id);
        $checkIn->keyResult->update(['current' => $checkIn->previous, 'done' => false]);
        if($checkIn->delete()) {
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
