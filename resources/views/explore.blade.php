<x-app-layout>

    <h2 class="font-bold text-2xl text-blue 400 mb-4">
        Search User
    </h2>
    <form action="{{route('profile.find')}}" method="post" class="mb-4 p-2 flex border border-gray-200 rounded-xl shadow-xl">
        @csrf
        <input type="text" name="username" placeholder="Type Usename" class="flex-1 border-none rounded-xl p-2 text-gray-400 w-full">
        <button class="px-4 bg-teal-400 text-white text-xl rounded-xl">Search</button>
    </form>
    @forelse ($users as $user)
    <div class="flex items-center justify-between">
        <a href="{{route('profile.view',$user->id)}}" class="flex gap-2 items-center">
        <img src="{{$user->getAvatarPath()}}" alt="" class="h-16 w-16 rounded-full object-cover cursor-pointer">
        {{$user->name}}
    </a>
    <form action="{{route('user.follow',$user->id)}}" method="POST">
        @csrf
    <button class="px-4 py-2 border-nonr rounded-xl shadow-lg bg-blue-400 text-white" type="submit">
        {{auth()->user()->isFollowing($user) ? 'UnFollow':'Follow'}}
    </button>
    </form>

    </div>
    @empty
        <h2 class="text-center text-2xl font-bold my-4">
            There are no users
        </h2>
    @endforelse
    
</x-app-layout>