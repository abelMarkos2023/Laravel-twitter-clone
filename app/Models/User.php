<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use App\Traits\Followable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Followable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar',
        'username',
        'profile_bg'
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
        'password' => 'hashed',
    ];


    public function tweets(){
        return $this->hasMany(Tweet::class,'user_id','id');
    }


    // public function getAvatar(){
    //     return $this->avatar;
    // }

    public function getAvatarPath(){
        return asset('storage/'.$this->avatar);
    }
    public function timeline(){
        $ids = $this->follows->pluck('id');
        $ids->push($this->id);
        $tweets = Tweet::withLikes()->whereIn('user_id',$ids)->latest()->get();
        return $tweets;
    }

    public function likes(){
        return $this->hasMany(Like::class);
    }
}
