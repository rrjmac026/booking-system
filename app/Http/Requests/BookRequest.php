<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'quantity' => ['required', 'integer', 'min:0'],
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The book title is required.',
            'title.string' => 'The book title must be a valid string.',
            'title.max' => 'The book title may not be greater than 255 characters.',

            'author.required' => 'The author name is required.',
            'author.string' => 'The book title must be a valid string.',
            'author.max' => 'The author name may not be greater than 255 characters.',

            'quantity.required' => 'The quantity field is required.',
            'quantity.string' => 'The quantity must be a string value.',
            'quantity.max' => 'The quantity may not exceed 255 characters.',
        ];
    }
}
