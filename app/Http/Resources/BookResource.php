<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BookResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->{'id'},
            'name' => $this->{'name'},
            'isbn' => $this->{'isbn'},
            'authors' => json_decode($this->{'authors'}),
            'number_of_pages' => $this->{'number_of_pages'},
            'publisher' => $this->{'publisher'},
            'country' => $this->{'country'},
            'release_date' => Carbon::parse($this->{'release_date'})->format('Y-m-d'),
        ];
    }
}
