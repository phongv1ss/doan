<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'email'=>'required|string|email|unique:users,email,'.$this->id.'|max:191',
            'name'=>'required|string',
            'user_catalogue_id'=>'required|integer|gt:0',
          
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
            
        ];
    }
}
