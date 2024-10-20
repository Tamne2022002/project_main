<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StaticNewsEditRequest extends FormRequest
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
            'name' => 'required|regex:/^[\pL0-9\s]*$/u|max:255|min:10',
            'description' => 'required',
            'content' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.max' => 'Tên không vượt quá 255 ký tự',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.min' => 'Tên không dưới 10 ký tự',
            'description.required' => 'Mô tả không được để trống',
            'content.required' => 'Nội dung không được để trống',

        ];
    }
}
