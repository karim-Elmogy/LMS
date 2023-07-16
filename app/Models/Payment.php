<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
          'payment_type',
          'amount',
          'coupon',
          'transaction_id',
          'instructor_revenue',
          'admin_revenue',
          'instructor_payment_status',
          'user_id',
          'course_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function course()
    {
        return $this->belongsTo(Course::class,'course_id');
    }

}
