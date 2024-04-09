<x-app-layout>
    <h3 class="text-2xl font-bold text-blue-600">
        Edit Profile
    </h3>
    <form method="POST" action="{{route('profilePage.update',$user->id)}}" enctype="multipart/form-data" class="flex flex-col gap-2 max-w-4xl mx-auto my-4 p-8 shadow-2xl border-gray-200 rounded-xl">
        @csrf
        <div class="w-full flex gap-2">
            <input type="text" value="{{$user->name}}" name='name' class="p-2 border-gray-400 rounded-2xl shadow-2xl text-xl flex-1">
            @error('name')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
            <input type="text" value="{{$user->username ?? 'User Name '}}" name='username' class="p-2 border-gray-400 rounded-2xl shadow-xl text-xl flex-1">
            @error('username')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full flex gap-2">
            <input type="email" value="{{$user->email}}" name='email' class="p-2 border-gray-400 rounded-2xl shadow-xl text-xl flex-1">
            @error('email')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>

        <div class="w-full flex gap-2">
            <input type="text" placeholder="New Password" name='password' class="p-2 border-gray-400 rounded-2xl shadow-2xl text-xl flex-1">
            @error('password')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
            <input type="text" placeholder="New Password Confirmation" name='password_confirmation' class="p-2 border-gray-400 rounded-2xl shadow-xl text-xl flex-1">
            @error('password_confirmation')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
        </div>
        <div class="w-full flex gap-2">
            <input type="file" class="p-2 border-gray-400 rounded-2xl shadow-xl text-xl flex-1" name="profile_bg" id="">
            @error('profile_bg')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
            <img src="{{asset('/storage/'.$user->profile_bg)}}" width="80" alt="" id="avatar">
        </div>
        <div class="w-full flex gap-2">
            <input type="file" class="p-2 border-gray-400 rounded-2xl shadow-xl text-xl flex-1" name="avatar" id="">
            <img src="{{$user->avatar}}" width="80" alt="" id="avatar">
            @error('avatar')
                <span class="text-sm text-red-500">{{$message}}</span>
            @enderror
           
        </div>

        <button class="bg-teal-400 py-2 px-4 my-4 rounded-xl shadow-xl cursor-pointer text-white border-none" type="submit">
            Update
        </button>
    </form>
</x-app-layout>