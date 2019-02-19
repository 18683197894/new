<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeviceTermForm extends FormRequest
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
            'term_name'=>'required|max:6'
        ];
    }
    public function messages()
    {
        return [
            'term_name.required' => '为空',
            'term_name.max' => '最大32',
        ];
    }
}
