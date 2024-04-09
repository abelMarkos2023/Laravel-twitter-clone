<?php

namespace App\Models;

use App\Traits\Likeable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tweet extends Model
{
    use HasFactory,Likeable;
    //protected $with = ['withLikes'];
    protected $fillable = ['user_id','body','image_url'];


    public function owner(){
        return $this->belongsTo(User::class,'user_id');
    }

        
    public function likes(){
        return $this->hasMany(Like::class);
    }
}
