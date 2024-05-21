<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddBookRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }


        public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'published_year' => 'required|numeric',
            'author_ids' => 'required|array',
            'author_ids.*' => 'exists:authors,id',
        ];
    }



    public function messages() {
        return [
            'title.required' => 'Դաշտը պետք է պարտադիր լրացվի',
            'description.required' => 'Դաշտը պետք է պարտադիր լրացվի',
            'published_year.required' => 'Դաշտը պետք է պարտադիր լրացվի',
        ];
    }
}
