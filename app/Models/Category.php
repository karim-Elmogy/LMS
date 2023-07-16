<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable=['name','desc','slug','image'];

    public function sub_category()
    {
        return $this->hasMany(Sub_Category::class,'category_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class,'course_id');
    }
}
