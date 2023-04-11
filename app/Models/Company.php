<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'owner', 'tax_number'
    ];
    public function branch()
    {
        return $this->hasMany(Branch::class);
    }
}