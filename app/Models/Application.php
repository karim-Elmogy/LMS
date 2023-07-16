<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;

    protected $fillable=[
        'address',
        'phone',
        'message',
        'document',
        'status',
        'user_id',
    ];


    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

}
