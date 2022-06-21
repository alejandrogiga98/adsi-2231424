<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
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
                'name' => 'required',
                'image' => 'required',
                'description' => 'required',
            ];
        } else {
            return [
                'name' => 'required',
                'image' => 'required',
                'description' => 'required',
            ];
        }
    }

    public function messages(){
        return [
            'name.required' => 'The :attribute is required child...',
            'description.required' => 'Please: :attribute',
        ];
    }

    public function attributes(){
        return [
            'name' => 'Write a name for the Category',
            'description' => 'Describe this Category... ¿ok?',
        ];
    }

}
