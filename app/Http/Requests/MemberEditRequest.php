<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MemberEditRequest extends FormRequest
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
            'full_name' => [
                'required',
                'string',
                'regex:/^[\pL0-9\s]*$/u',
                'max:255',
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
                'max:255',
                'email',
            ],
             
        ];
    }
    public function messages()
    {
        return [
            'full_name.required' => 'Tên không được để trống',
            'full_name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu), số và khoảng trắng',
            'full_name.max' => 'Tên không được vượt quá 255 ký tự',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.max' => 'Số điện thoại không được vượt quá 10 ký tự',
            'address.required' => 'Địa chỉ không được để trống',
            'address.max' => 'Địa chỉ không được vượt quá 255 ký tự',
            'email.required' => 'Email không được để trống',           
            'email.max' => 'Email không vượt quá 255 ký tự',
            'email.email' => 'Vui lòng nhập đúng định dạng email',
                ];
    }
}
