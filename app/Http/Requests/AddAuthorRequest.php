<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddAuthorRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'first_name' => 'required|string',
            'last_name' => 'required|string',
            'biography' => 'nullable|string',

        ];
    }
}
