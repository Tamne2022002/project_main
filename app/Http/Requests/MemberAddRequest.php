<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberAddRequest extends FormRequest
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
            'first_name' => [
                'required',
                'string',
                'regex:/^[\pL0-9\s]*$/u',
                'max:20',
            ],
            'last_name' => [
                'required',
                'string',
                'regex:/^[\pL0-9\s]*$/u',
                'max:100',
            ],
            'phone' => [
                'required',
                'string',
                'max:10',
            ],
            'address' => [
                'required',
                'string',
                'max:255',
            ],
            'email' => [
                'required',
                'unique:users,email',
                'max:255',
                'email',
            ],
            'password' => [
                'required',
            ],
        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'Tên không được để trống',
            'first_name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'first_name.max' => 'Tên không được vượt quá 20 ký tự',
            'last_name.required' => 'Họ và tên đệm không được để trống',
            'last_name.regex' => 'Họ và tên đệm chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'last_name.max' => 'Họ và tên đệm không được vượt quá 100 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email đã tồn tại',
            'email.max' => 'Email không vượt quá 255 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }

}
