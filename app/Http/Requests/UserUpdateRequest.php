<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UserUpdateRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        // http://localhost:8000/api/users/1 === api/users/{user}
        // 1 <<<<          $this->segment(3) === $this->user

        return [
            'first_name' => 'string|min:2|max:255',
            'last_name' => 'string|min:2|max:255',
            'phone' => [
                'string',
                'min:9',
                'max:15',
                Rule::unique('users', 'phone')->ignore($this->user)
            ],
            'email' => [
                'string',
                'email',
                'max:255',
                Rule::unique('users', 'email')->ignore($this->user)
            ],
            'username' => [
                'required',
                'string',
                'min:3',
                'max:255',
                Rule::unique('users', 'username')->ignore($this->user)
            ],
            'password' => 'required|string|min:6|max:50'
        ];
    }
}
