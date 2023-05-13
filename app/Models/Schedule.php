<?php

namespace App\Models;

use App\Models\User;
use App\Models\Course;
use App\Models\Employee;
use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Schedule extends Model
{
    use HasFactory;
    protected $fillable = ['start_date', 'end_date', 'start_time', 'end_time', 'course_id', 'class_room_id', 'instructor_id','created_by'];
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }
    public function class_room()
    {
        return $this->belongsTo(ClassRoom::class, 'class_room_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
    public function instructor()
    {
        return $this->belongsTo(Employee::class, 'instructor_id');
    }
}
