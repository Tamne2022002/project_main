<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserEditRequest extends FormRequest
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
            'name' => [
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
            // 'email' => [
            //     'required',
            //     'string',            
            //     'max:255',
            //     'email',
            //     'unique:table_member,email'
            // ],
             
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'name.max' => 'Tên không được vượt quá 20 ký tự', 
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            // 'email.required' => 'Email không được để trống',           
            'email.max' => 'Email không vượt quá 255 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
            'email.unique' => 'Email đã được sử dụng ở tài khoản khác',
        ];
    }
}
