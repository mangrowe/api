<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Auth;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Auth::user()->organizations()->orderBy('title')->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $organization = Organization::create($request->all());
        if($organization) {
            $organization->users()->attach(Auth::user()->id);
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
        return Organization::findOrFail($id);
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
        $organization = Organization::findOrFail($id);
        if($organization->update($request->all())) {
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
        $organization = Organization::findOrFail($id);
        if($organization->delete()) {
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
