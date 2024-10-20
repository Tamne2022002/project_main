<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleAddRequest extends FormRequest
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
            'name' => 'required|unique:roles|regex:/^[\pL0-9\s]*$/u|max:255',
            'display_name' => 'required',

        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Vai trò không được để trống',
            'name.unique' => 'Vai trò không được trùng',
            'name.regex' => 'Vai trò chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Vai trò không vượt quá 255 ký tự',
            'display_name.required' => 'Mô tả vai trò không được để trống', 
        ];
    }
}
