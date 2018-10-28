<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Auth;
use App\Models\Organization;
use App\Models\Impediment;
use App\Models\KeyResult;

class ImpedimentsController extends Controller
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
            'impediments' => Impediment::where('key_result_id', $request->input('key_result_id'))->whereNull('parent_id')->with('user')->with('children')->latest()->get(),
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
        $keyResult = KeyResult::findOrFail($request->input('key_result_id')); 
        return response()->json([
            'objective' => $keyResult->objective->title,
            'keyResult' => $keyResult->title,
            'users' => $keyResult->organization->users,
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
        $req['user_id'] = Auth::guard('api')->user()->id;
        if(Impediment::create($req)) {
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $impediment = Impediment::with('user')->with('receiver')->findOrFail($id);
        $impediments = Impediment::where('parent_id', $id)->with('user')->with('receiver')->get();
        return response()->json([
            'impediment' => $impediment,
            'impediments' => $impediments,
            'objective' => $impediment->keyResult->objective->title,
            'keyResult' => $impediment->keyResult->title,
            'users' => $impediment->keyResult->organization->users,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
