<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductAddRequest extends FormRequest
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
            'name' => 'bail|required|unique:table_product|regex:/^[\pL0-9\s]*$/u|max:255|min:1',
            'id_list' => 'required',
            'id_publisher' => 'required',
            // 'desc' => 'required',
            // 'content' => 'required',
            // 'photo_path' => 'required|mimes:jpg,jpeg,png|max:20480',
            // 'regular_price' => 'required|numeric|min:0',
            // 'sale_price' => 'numeric|min:0',
            // 'discount' => 'nullable|numeric|between:1,99',
            // 'publishing_year' => 'required|integer|min:1900',
            // 'code' => 'required|unique:table_product|string|max:255',
            // 'author' => 'required|regex:/^[\pL\s]*$/|max:255',
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Tên không được để trống',
            'name.unique' => 'Tên không được phép trùng',
            'name.max' => 'Tên không vượt quá 255 ký tự',
            'name.regex' => 'Tên chỉ được bao gồm các ký tự chữ cái, số và khoảng trắng',
            'name.min' => 'Tên không được rỗng',
            'id_list.required' => 'Danh mục không được để trống',
            'id_publisher.required' => 'Nhà xuất bản không được để trống',
            // 'desc.required' => 'Mô tả không được để trống',
            // 'content.required' => 'Nội dung không được để trống',
            // 'photo_path.required' => 'Hình ảnh không được để trống',
            // 'photo_path.mimes' => 'Ảnh phải có định dạng JPG, JPEG hoặc PNG',
            // 'photo_path.max' => 'Ảnh không được quá 20MB',
            // 'regular_price.required' => 'Giá bán không được để trống',
            // 'regular_price.numeric' => 'Giá bán phải là số',
            // 'regular_price.min' => 'Giá bán không được nhỏ hơn 0', 
            // 'sale_price.min' => 'Giá giảm không được nhỏ hơn 0',
            // 'discount.nullable' => 'Chiết khấu có thể để trống',
            // 'discount.numeric' => 'Chiết khấu (nếu có) phải là số',
            // 'discount.between' => 'Chiết khấu (nếu có) phải nằm trong khoảng từ 1 đến 99%',
            // 'publishing_year.required' => 'Năm xuất bản không được để trống',
            // 'publishing_year.integer' => 'Năm xuất bản phải là số nguyên',
            // 'publishing_year.min' => 'Năm xuất bản không được nhỏ hơn 1900',
            // 'code.required' => 'Mã sách không được để trống',
            // 'code.unique' => 'Mã sách này đã được sử dụng. Vui lòng chọn mã khác.',
            // 'code.string' => 'Mã sách phải là chuỗi ký tự',
            // 'code.max' => 'Mã sách không được dài quá 255 ký tự',  
            // 'author.required' => 'Tên tác giả không được để trống.',
            // 'author.regex' => 'Tên tác giả chỉ được bao gồm các ký tự chữ cái (bao gồm tiếng Việt có dấu) và khoảng trắng.',
            // 'author.max' => 'Tên tác giả không vượt quá 255 ký tự.',
        ];
    }
}
