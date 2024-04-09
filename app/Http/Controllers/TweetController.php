<?php

namespace App\Http\Controllers;

use App\Models\Tweet;
use App\Http\Requests\StoreTweetRequest;
use App\Http\Requests\UpdateTweetRequest;
use App\Models\User;

class TweetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTweetRequest $request)
    {
        $data = $request->validated();
        if($request->hasFile('image_url')){
            $data['image_url'] = $request->file('image_url')->store('images',['disk' => 'public']);
        }
        auth()->user()->tweets()->create($data);
        return back()->with('success','Tweet Published Successfuly');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //dd($user);
        return view('profile',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tweet $tweet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $user)
    {
        if(auth()->user()->isFollowing($user)){
            auth()->user()->follows()->detach($user);
        }else{
            auth()->user()->follows()->save($user);

        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tweet $tweet)
    {
        $tweet->delete();
        return back();
    }
}
