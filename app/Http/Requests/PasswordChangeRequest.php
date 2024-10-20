<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PasswordChangeRequest extends FormRequest
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
            'current_password' => [
                'required'
            ],
            'new_password' => [                
                'required',
                'string',
                'min:8',
                'max:32',
                'regex:/[a-z]/', 
                'regex:/[A-Z]/', 
                'regex:/[0-9]/', 
                'regex:/[@$!%*#?&]/', 
            ],
            'new_password_confirm' => [
                'required',
                'string',
                'min:8',
                'max:32',
            ],            
        ];
    }
    public function messages()
    {
        return [
            'current_password.required' => 'Mật khẩu hiện tại không được để trống',
            'new_password.required' => 'Mật khẩu mới không được để trống',
            'new_password.min' => 'Mật khẩu mới không được dưới 8 ký tự',
            'new_password.max' => 'Mật khẩu mới không được quá 32 ký tự',
            'new_password_confirm.required' => 'Xác nhận mật khẩu không được để trống',
            'new_password.regex' => 'Mật khẩu phải chứa ít nhất 1 chữ cái viết hoa, chữ thường, và ký tự đặc biệt',
        ];
    }
}
