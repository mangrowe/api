<?php

namespace App\Http\Requests;

use App\Http\Requests\FormRequest;
use Illuminate\Validation\Rule;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validation = [];
        $validation['name']  = ['required', 'min:2', 'max:100'];
        $validation['email'] = ['required', Rule::unique('users')->ignore($this->user)];

        if(strtolower($this->method()) == 'post' || (strtolower($this->method()) == 'put' && strlen($this->password) >= 1)) {
            $validation['password'] = ['required', 'min:6'];
        }

        return $validation;
    }
}
