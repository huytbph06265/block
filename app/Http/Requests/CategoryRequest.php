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
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $validate =[
            'description' =>
                [
                    'required',
                    'min:10',
                    'max:1000'
                ],
        ];
        $validate['name'] = 'required|unique:categories,name';
        if(!$this->id){
            $validate['image'] = 'required|file|mimes:jpeg,png';
        }
        return $validate;
    }
    public function messages()
    {
        return [
            'name.required' => 'Danh mục không được để trống',
            'name.unique' => 'Danh muc đã tồn tại',
            'description.required' => 'Tiêu đề không được để trống',
            'description.min' => 'Tóm tắt không đucợ ít hơn 10 kí tự*',
            'description.max' => 'Tóm tắt không đucợ nhập quá 1000 kí tự',
            'image.required' => 'image không được trống',
            'image.file' => 'Vui lòng nhập đúng định dạng file',
            'image.mimes' => 'Vui lòng nhập đúng định dạng ảnh',
        ];
    }
}
