<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request)
    {
        return [

            'id' => $this->id,
            'name' => $this->name,
            'price' => $this->price,
            'hours' => $this->hours,
            'category_id' => $this->category_id,
            'vendor_id' => $this->vendor_id,

        ];
    }
}
