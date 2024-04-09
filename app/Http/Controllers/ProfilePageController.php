<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProfilePageController extends Controller
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
        $users = User::inRandomOrder()->take(10)->get();
        return view('explore',compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $needle = "%".$request->username."%";
        $users = User::query()->where('name','like',$needle)->orWhere('username','like',$needle)->get();
       // dd($users);
        return view('explore',compact('users'));

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $this->authorize('update',$user);
        return view('edit-profile',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name'         => 'required|max:255',
            'username'     => ['required','max:255','alpha_dash',Rule::unique('users')->ignore($user)],
            'email'        => 'required|max:255|email',
            'avatar'       => 'file|mimes:png,jpg,jpeg',
            'profile_bg'   => 'file|mimes:png,jpg,jpeg',
        ]);
        // dd($user->getAvatar());
        // dd(Storage::exists($user->avatar));
        if($request->hasFile('avatar')){
            $data['avatar'] = $request->file('avatar')->store('avatars',['disk' => 'public']);

            if(Storage::disk('public')->exists($user->avatar))
            {
                Storage::disk('public')->delete($user->avatar);
            }                                                                                   
          
        }
        if($request->hasFile('profile_bg')){
            $data['profile_bg'] = $request->file('profile_bg')->store('profile_bgs',['disk' => 'public']);
            if(Storage::disk('public')->exists($user->profile_bg))
            {
                Storage::disk('public')->delete($user->profile_bg);
            } 
          
        }
        $user->update($data);
        return redirect()->route('profile.view',$user->id)->with('success','Your profile has been updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
