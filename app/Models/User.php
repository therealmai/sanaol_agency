<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'fname',
        'lname',
        'email',
        'password',
        'bio',
        'insta_handle',
        'user_type',
        'is_deleted',
        'is_member'
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

    //Can be used to retieve the hero banner of the user
    public function HeroBanner(){
        return $this->hasOne(HeroBanner::class, 'user_id');
    }

    //Can be used to retieve the news involving the user
    public function News(){
        return $this->hasMany(News::class, 'user_id');
    }

    //Can be used to retrieve the services that the user uses
    public function Services(){
        return $this->hasMany(Service::class, 'user_id');
    }
        
    //Can be used to retirve the images belonging to the user
    public function UserImages(){
        return $this->hasMany(UserImage::class, 'user_id');
    }
}
