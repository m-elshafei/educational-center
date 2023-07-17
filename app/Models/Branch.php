<?php

namespace App\Models;

use App\Models\Company;
use App\Models\ClassRoom;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Branch extends Model
{
    use HasFactory;
    protected $table = 'branches';

    protected $fillable = [
        'name',
        'location',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function class_rooms()
    {
        return $this->hasMany(ClassRoom::class);
    }

    public static $rules = [
        'name' => 'required',
        'location' => 'required',
        'company_id' => 'required'
    ];
}
