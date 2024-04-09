<?php

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

trait Followable{


    public function follow(User $user){

        return $this->follows()->save($user);
    }

    
    // select `users`.*, `follows`.`user_id` as `pivot_user_id`, `follows`.`following_user_id` as `pivot_following_user_id` from `users` inner join `follows` on `users`.`id` = `follows`.`following_user_id` where `follows`.`user_id` = 1
    public function follows(){
        return $this->belongsToMany(User::class,'follow','user_id','following_user_id');
    }
/**
         * The roles that belong to the Followable
         *
         * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
         */
        public function follower(): BelongsToMany
        {
            return $this->belongsToMany(User::class, 'follow', 'following_user_id', 'user_id');
        }

    public function isFollowing(User $user){

        return $this->follows()->where('following_user_id',$user->id)->exists();
    }
}