<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

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
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method()=='PUT'){
            return [
                'fullname' => 'required',
                'email' => 'required|email|unique:users,email,'.$this->id,
                'phone' => 'required|numeric',
                'birthdate' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'role' => 'required',
            ];
        } else {
            return [
                'fullname' => 'required',
                'email' => 'required|email|unique:users',
                'phone' => 'required|numeric',
                'birthdate' => 'required|date',
                'gender' => 'required',
                'address' => 'required',
                'photo' => 'required|image|max:2000',
                'role' => 'required',
                'password' => 'required|min:4|confirmed',
            ];
        }
    }

    public function messages(){
        return [
            'fullname.required' => 'The :attribute is required child...',
            'password.min' => 'Min 4 characters',
            'phone.required' => 'Please: :attribute',
        ];
    }

    public function attributes(){
        return [
            'fullname' => 'Shell Bullet',
            'phone' => 'Your telephone number...',
        ];
    }



}

