<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PublisherAddRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[\pL0-9\s]*$/u|unique:table_publishers|max:255',
            // 'desc' => 'required',
            'photo_path' => 'required|mimes:jpg,png|max:20480',
        ];
    }

    public function messages()
    { 

        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Tên không vượt quá 255 ký tự',
            // 'desc.required' => 'Mô tả không được để trống',
            // 'photo_path.required' => 'Hình ảnh không được để trống',
            'photo_path.mimes' => 'Ảnh phải có định dạng JPG, JPEG hoặc PNG',
            // 'photo_path.max' => 'Ảnh không được quá 20MB',
        ];
    }

}
