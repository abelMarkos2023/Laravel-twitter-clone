<h2 class="font-bold text-xl mb-4">Friends List</h2>
<ul class="p-4">

    @foreach (auth()->user()->follows as $user)
    <li class="mb-2"> 
        <div class="flex items-center gap-2" >
            <a href="{{route('profile.view',$user->id)}}">
            <img src="{{$user->avatar}}" alt="avatar" class="w-10 h-10 rounded-full">
        </a>
            <div class="flex flex-col justify-center">
                <h3 class="font-bold text-sm">
                    <a href="{{route('profile.view',$user->id)}}">
                        {{$user->name}}

                    </a>
                </h3>
            </div>
    </li>
    @endforeach
    
</ul>