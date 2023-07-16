<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'description',
        'short_description',
        'section',
        'requirements',
        'image',
        'video_url',
        'course_overview_provider',
        'meta_keywords',
        'meta_description',
        'is_free_course',
        'status',
        'is_top_course',
        'price',
        'discount_price',
        'category_id',
        'sub_category_id',
        'user_id',
        'multi_instructor',
        'language',
        'level'
    ];



    public function category()
    {
        return $this->belongsTo(Category::class,'category_id');
    }

    public function sub_category()
    {
        return $this->belongsTo(Sub_Category::class,'sub_category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function section()
    {
        return $this->hasOne(Section::class,'course_id');
    }

    public function lesson()
    {
        return $this->hasMany(Lesson::class,'course_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class,'course_id');
    }

}
