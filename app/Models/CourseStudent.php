<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CourseStudent extends Model
{
    use HasFactory;

    public function user()
    {
       return $this->hasOne(User::class,'id','created_by');
    }
    public function student()
    {
       return $this->hasOne(User::class,'id','student_id');
    }

}
