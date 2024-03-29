<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';
    protected $fillable = ['name', 'price', 'hours', 'category_id', 'vendor_id'];
    public function sub_categories()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }
    public function main_category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
    public function courses()
    {
        return $this->hasMany(Course::class, 'category_id', 'id');
    }
    public static $rules = [
        'name' => 'required'
    ];
}
