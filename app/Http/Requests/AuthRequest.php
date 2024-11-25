<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
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
            'email'=>'required',
            'password'=>'required',
        ];
    }
    public function messages(): array
    {
        return [
            'email.require' =>"ban chua nhap email",
            'email.email' =>"email chua dung dinh dang !! vd:abc@gmail.com",
            'password.require' =>"ban chua nhap password",
        ];
    }
}
