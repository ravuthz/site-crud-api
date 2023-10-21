<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ArticleStoreRequest extends FormRequest
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
            'category_id' => ['required', 'integer'],
            'type_id' => ['required', 'integer'],
            'slug' => ['required', 'string', Rule::unique('articles', 'slug')],
            'title' => ['required', 'string'],
            'excerpt' => ['string'],
            'content' => ['string'],
            'image' => ['string'],
            'status' => ['string'],
            'options' => ['array'],
        ];
    }
}
