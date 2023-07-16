<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    use HasFactory;

    protected $fillable=['title','course_id'];


    public function course()
    {
        return $this->belongsToMany(Course::class,'course_id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class,'section_id');
    }
}
