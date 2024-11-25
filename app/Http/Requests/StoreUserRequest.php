<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
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
            'email'=>'required|string|email|unique:users|max:191',
            'name'=>'required|string',
            'user_catalogue_id'=>'required|integer|gt:0',
            'password'=>'required|string|min:6',
            're_password'=>'required|string|same:password',
        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => "Bạn chưa nhập email",
            'email.email' => "Email chưa đúng định dạng! VD: abc@gmail.com",
            'email.unique' => "Email đã tồn tại!",
            'email.string' => "Email phải là một chuỗi ký tự",
            'name.required' => "Bạn chưa nhập họ tên!",
            'user_catalogue_id.required' => "Bạn chưa chọn vai trò!",
            'user_catalogue_id.gt' => "Vai trò phải lớn hơn 0!",
            'password.required' => "Bạn chưa nhập mật khẩu!",
            'password.min' => "Mật khẩu phải có ít nhất 6 ký tự!",
            're_password.required' => "Bạn chưa nhập lại mật khẩu!",
            're_password.same' => "Mật khẩu không khớp!",
        ];
    }
    
}
