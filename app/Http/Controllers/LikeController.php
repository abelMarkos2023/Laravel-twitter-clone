<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use Illuminate\Http\Request;

class LikeController extends Controller
{
    public function like(Tweet $tweet){
        if($tweet->isLiked(auth()->user())){
            $tweet->likes()->where('user_id',auth()->id())->delete();
            return back();
        }
        $tweet->like();
        return back();
    }

    public function dislike(Tweet $tweet){
        if($tweet->isDisliked(auth()->user())){
            $tweet->likes()->where('user_id',auth()->id())->delete();
            return back();
        }
        $tweet->dislike();
        return back();
    }
}
