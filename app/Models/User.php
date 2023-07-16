<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }


    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'status',
        'payment_keys',
        'social_links',
        'is_instructor',
        'google_id',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function course()
    {
        return $this->hasMany(Course::class,'user_id');
    }

    public function enrollment()
    {
        return $this->hasMany(Enrollment::class,'user_id');
    }

    public function payout()
    {
        return $this->hasMany(Payout::class,'user_id');
    }

    public function payment()
    {
        return $this->hasMany(Payment::class,'user_id');
    }



}
