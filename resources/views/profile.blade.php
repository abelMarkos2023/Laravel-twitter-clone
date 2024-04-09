<x-app-layout>
    <div class="border border-gray-300 rounded-xl ">

        <div class="relative">
            <img src="{{asset('storage/'.$user->profile_bg)}}" alt="" class="w-full h-64 object-cover rounded-xl shadow-lg ">
            <img src="{{asset($user->getAvatarPath())}}" alt="" class="w-24 h-24 rounded-full object-cover absolute top-[100%] translate-y-[-50%] left-[50%] translate-x-[-50%] ">
        </div>
        
        
       

       <div class="flex items-start justify-between p-4">
        <div class="left flex flex-col gap-2">
            <h1 class="text-2xl font-bold text-blue-300">
                {{$user->name}}
            </h1>
            
            <h3 class="text-xs font-bold text-blue500">
                Following : {{$user->follows()->count()}}
            </h3>
            <h2 class="text-orange-400 text-sm italic">{{$user->email}}</h2>
        </div>
        <div class="right flex flex-col gap-2">
            <h3 class="text-blue-400 font-bold">
                Joined : {{$user->created_at->diffForhumans()}}
            </h3>
            <h2 class="text-xs font-bold text-lime-500">
                Followed By {{$user->follower()->count()}} User
            </h2>
            <div class="controll flex items-center gap-2">
                @can('update',$user)
                <a href="{{route('profile.show',auth()->user()->id)}}" class="border-none rounded-xl px-4 py-1 shadow-2xl bg-teal-500 text-gray-200">Edit Profile</a>
                @else
                <form action="{{route('user.follow',$user->id)}}" method="POST">
                    @csrf
                    <button class="bg-blue-500 rounded-xl border-none px-4 py-1 shadow-xl text-white">
                        @if (auth()->user()->isFollowing($user))
                            UnFollow
                        @else
                            Follow
                        @endif
                    </button>
                </form>
                @endcan
            </div>
        </div>
       </div>
       <div class="px-8 py-2 text-sm text-center">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate repellendus quis nulla laboriosam eum amet doloribus  officiis minus, dolore tempore odio labore. Dolorum cumque corrupti ipsa.
       </div>
    </div>
    <div class="border border-gray-300 rounded-xl mt-12 p-4 flex flex-col gap-4">
    @forelse ($user->tweets as $tweet)
        @include('partials.tweet')
        @empty
  <h2 class="text-center font-bold text-2xl">There Are No Tweets Yet.</h2>
    @endforelse
    </div>
    
</x-app-layout>