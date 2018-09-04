<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Mail;
use App\Models\User;
use App\Mail\ResetPasswordMail;

class ResetPasswordController extends Controller
{
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
        ]);
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function reset(Request $request)
    {
        $errors = $this->validator($request->all())->errors();

        if(count($errors)) {
            return response(['errors' => $errors], 401);
        }

        $user = User::where('email', $request->input('email'))->first();
        
        if($user) {
            $password = str_random(6);
            $user->update(['password' => bcrypt($password)]);
            Mail::to($request->input('email'))->send(new ResetPasswordMail($user, $password));
            return response(['message' => trans('mails.reset')], 200);
        }
        return response(['message' => trans('passwords.user')], 401);
    }
}
