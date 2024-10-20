<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
            'name' => 'regex:/^[\pL0-9\s]*$/u|max:20',
            'description' => 'max:255',
            'phone' => 'max:10',
            'email' => 'max:255|email|unique:users,email',
            'zalo' => 'nullable|max:10',
            'address' => 'max:255',
            'fanpage' => 'max:255',
            'website' => 'max:255',
            'logo_path' => 'mimes:jpg,png|max:20480',
            'favicon_path' => 'mimes:jpg,png|max:20480',
        ];
    }

    public function messages()
    {
        return [
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Tên không được vượt quá 20 ký tự',
            'description.max' => 'Email không vượt quá 255 ký tự',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'email.max' => 'Email không vượt quá 255 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'zalo.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'fanpage.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'website.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'photo_path.mimes' => 'Ảnh phải có định dạng JPG, JPEG hoặc PNG',
            'photo_path.max' => 'Ảnh không được quá 20MB',
        ];
    }
}
