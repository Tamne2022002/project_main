<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsEditRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|regex:/^[\pL0-9\s]*$/u|max:255',
            'description' => 'required',
            'content' => 'required',
            'photo_path' => 'mimes:jpg,jpeg,png|max:20480',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Tên không vượt quá 255 ký tự',
            'description.required' => 'Mô tả không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'photo_path.mimes' => 'Ảnh phải có định dạng JPG, JPEG hoặc PNG',
            'photo_path.max' => 'Ảnh không được quá 20MB',
        ];
    }
}
