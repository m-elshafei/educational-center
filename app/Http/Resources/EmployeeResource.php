<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
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
            'job_title' => $this->job_title,
            'salary' => $this->salary,
            'hire_date' => $this->hire_date,
            'user_id' => $this->user_id,
        ];
    }
}
