<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\Organization;
use App\Models\User;

use \Exception;


class RegisterController extends Controller
{
    /**
     * Register a new user and organization.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(UserRequest $request)
    {
        try {
            $req = $request->all();
            $organization = Organization::create($req);
            $req['password'] = bcrypt($req['password']);
            $organization->users()->save(new User($req));

            if ($organization) {
                return response()->json([
                    'message' => trans('messages.success')
                ]);
            } else {
                return response()->json([
                    'message' => trans('messages.error')
                ], 400);
            }
        } catch (Exception $e) {
            // $e->getMessage();
            return response(['message' => trans('passwords.user')], 401);
        }
    }
}
