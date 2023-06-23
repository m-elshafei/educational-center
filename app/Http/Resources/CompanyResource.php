<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'tax_number' => $this->tax_number,
            'owner' => $this->owner

        ];
    }
}
