<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassRoom extends Model
{
    use HasFactory;
    protected $table = 'class_rooms';

    protected $fillable = ['name', 'configration', 'capacity', 'branch_id'];
    public function branch()
    {
        return $this->belongsTo(Branch::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class, 'class_room_id', 'id');
    }
    public static $rules = [
        'name' => 'required',
        'capacity' => 'required',
        'branch_id' => 'required'

    ];
}
