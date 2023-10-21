<?php

namespace App\Http\Requests;

use App\Models\SettingType;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SettingTypeStoreRequest extends FormRequest
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
        return [
            'name' => [
                'string',
                'min:2',
                'max:255',
                Rule::unique('setting_types', 'name')
            ],
            'desc' => 'string|min:2|max:255',
        ];
    }
}
