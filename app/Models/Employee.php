<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';

    protected $fillable=['job_title','salary','hire_date','user_id'];
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
    public function schedule()
    {
       return $this->belongsTo(Schedule::class);
    }
}
