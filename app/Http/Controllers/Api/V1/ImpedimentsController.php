<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Auth;
use Mail;

use App\Models\Organization;
use App\Models\Impediment;
use App\Models\KeyResult;
use App\Mail\ImpedimentReceiverMail;

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
            'owner_id' => Auth::guard('api')->user()->id,
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
        if($request->hasFile('archive')) {
            $attach = $request->file('archive')->store('archives');
            if($attach) $req['archive'] = $attach;
        }
        $impediment = Impediment::create($req);
        if($impediment) {
            if($impediment->receiver_id) {
                Mail::to($impediment->receiver->email)->send(new ImpedimentReceiverMail($impediment));
            }
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
            'owner_id' => Auth::guard('api')->user()->id,
            'closed' => Impediment::where('parent_id', $id)->where('status', 3)->first(),
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
