<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBookRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string',
            'isbn' => 'required|string',
            'authors' => 'array|required',
            'country' => 'required',
            'number_of_pages' => 'required|integer',
            'publisher' => 'required',
            'release_date' => 'required|date',
        ];
    }
}
