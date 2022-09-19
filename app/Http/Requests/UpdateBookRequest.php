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
            'name' => 'filled|string',
            'isbn' => 'filled|string',
            'authors' => 'array|filled',
            'country' => 'filled',
            'number_of_pages' => 'filled|integer',
            'publisher' => 'filled',
            'release_date' => 'filled|date',
        ];
    }
}
