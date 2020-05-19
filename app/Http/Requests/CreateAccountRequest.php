<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAccountRequest extends FormRequest
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
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required|min:6',
            'repassword' => 'required|same:password',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không thể để trống *',
            'email.required' => 'Email không thể để trống*',
            'email.unique' => 'Email đã được sử dụng',
            'password.required' => 'Mật khẩu không đươc để trống*',
            'password.min' => 'Mật khẩu ít nhất 6 kí tự',
            'repassword.required' => 'Mật khẩu không đươc để trống*',
            'repassword.same' => 'Phải giống mật khẩu',
        ];
    }
}
