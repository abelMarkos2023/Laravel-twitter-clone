<?php 

namespace App\Traits;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;

trait Likeable{

    public function scopeWithLikes(Builder $query){
        $query->leftJoinSub('select tweet_id, sum(liked) liked, sum(!liked) disliked from likes group by tweet_id','likes','likes.tweet_id','tweets.id');
    }
    public function like(User $user=null,$like = true){
            
        $this->likes()->updateOrCreate([
            'user_id' => $user ? $user->id : auth()->id(),
        ],
    [
        'liked' => $like,
    ]
    );
    }

    public function dislike(User $user=null){
        return $this->like($user,false);
    }

    public function isLiked(User $user){
        return (bool) $user->likes()->where('tweet_id',$this->id)->where('liked',true)->count();
    }
    public function isDisliked(User $user){
        return (bool) $user->likes()->where('tweet_id',$this->id)->where('liked',false)->count();
    }

    
}