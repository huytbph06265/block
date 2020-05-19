<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Carbon\Carbon;

class PostRequest extends FormRequest
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
        $validate = [
            'summary' => [
                'required',
                'min:10',
                'max:1000'
            ],
            'content' => [
                'required',
                'min:10',
                'max:1000'
            ] ,
        ];
        $validate['title'] = 'required|unique:posts,title';
        $validate['publish_date'] = 'required|date|after:'.Carbon::now()->subDay()->format('Y-m-d');

        if(!$this->id){
            $validate['image'] = 'required|file|mimes:jpeg,png';
        }
        return $validate;
    }
    public function messages()
    {
        return [
            'summary.required' => 'Tóm tắt không đucợ để trống*',
            'summary.min' => 'Tóm tắt không đucợ ít hơn 10 kí tự*',
            'summary.max' => 'Tóm tắt không đucợ nhập quá 1000 kí tự',
            'content.required' => 'Nội dung không đucợ để trống*',
            'content.min' => 'Nội dung không đucợ ít hơn 10 kí tự*',
            'content.max' => 'nội dung không đucợ nhập quá 1000 kí tự',
            'title.required'  => 'Tiêu đề không được để trống',
            'title.unique' => 'Tiêu đề đã tồn tại',
            'publish_date.required' => 'Ngày bắt đầu không được để trống',
            'publish_date.date' => 'Ngày bắt đầu phải là ngày',
            'publish_date.after' => 'Ngày bắt đầu không được sau ngày'.now()->subDay()->format('Y-m-d'),
            'image.required' => 'image không được trống',
            'image.file' => 'Vui lòng nhập đúng định dạng file',
            'image.mimes' => 'Vui lòng nhập đúng định dạng ảnh',
        ];
    }
}
