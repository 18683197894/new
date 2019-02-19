<?php

namespace App\Http\Requests\Backend;

use Illuminate\Foundation\Http\FormRequest;

class MemberPersonalEdit extends FormRequest
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
            'nickname' => 'required|max:16',
            'sex' => 'required|numeric|max:1',
            'phone'=>'required|regex:[^[1][3578][0-9]{9}$]',
            'email' => 'required|email',
            'password' => ''
        ];
    }
    public function messages()
    {
        return [
        'request'=>':attribute 不能为空',
        'max'=>':attribute 最大:max位',
        'numeric'=>':attribute 格式错误',
        'email.email'=>'邮箱格式错误',
        'regex'=>':attribute 格式错误',
        ];
    }
}
