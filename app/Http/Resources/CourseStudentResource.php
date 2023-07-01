<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CourseStudentResource extends JsonResource
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
            'schedule_id' => $this->schedule_id,
            'student_id' => $this->student_id,
            'created_by' => $this->created_by,
        ];
    }
}
