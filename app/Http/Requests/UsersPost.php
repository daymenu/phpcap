<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UsersPost extends FormRequest
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
        return [
            'name' => 'required|max:255',
            'user_name' => 'required|alpha_dash|unique:users|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'repassowrd' => 'same:password|max:255',
        ];
    }
}
