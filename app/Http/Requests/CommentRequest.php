<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CommentRequest extends FormRequest
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
    public function rules(Request $request)
    {
        if ($request->user_id != 0)
        {
            return [
                'content' => 'required',
            ];
        }
        else{
            return [
                'name' => 'required',
                'email' => 'required|email',
                'content' => 'required',
            ];
        }

    }
    public function messages()
    {
        return [
            'name.required' => 'Bải phải nhập tên!',
            'email.required' => 'Bạn phải nhập email!',
            'email.email' => 'Bạn phải nhập đúng định dạng mail',
            'content' => 'Bạn phải nhập nội dung bình luận',
        ];
    }
}
