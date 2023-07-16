<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    use HasFactory;

    protected $fillable=
        [
            'name',
            'desc',
            'duration',
            'video_url',
            'video_type',
            'lesson_type',
            'is_free',
            'course_id',
            'section_id',
        ];

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
