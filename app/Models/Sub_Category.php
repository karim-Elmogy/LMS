<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sub_Category extends Model
{
    use HasFactory;
    protected $fillable=['name','desc','slug','image','category_id'];


    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function course()
    {
        return $this->hasMany(Course::class,'course_id');
    }

}
