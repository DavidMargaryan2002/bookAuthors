<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'published_year' => 'nullable|integer|min:1900|max:' . date('Y'),
            'author_id' => 'nullable|array',
            'author_id.*' => 'exists:authors,id',
        ];
    }
}
