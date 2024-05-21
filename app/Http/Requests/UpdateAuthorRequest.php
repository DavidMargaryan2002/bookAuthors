<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'biography' => 'nullable|string',
            'books_id' => 'nullable|array',
            'books_id.*' => 'exists:books,id',
        ];
    }
}
