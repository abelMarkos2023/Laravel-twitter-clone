<div class="flex gap-2 items-start flex-shrink-0">
    <a href="{{route('profile.view',$tweet->owner->id)}}">
    <img src="{{$tweet->owner->getAvatarPath()}}" class="w-12 h-12 rounded-full object-contain " alt="">
    </a>
    
    <div class="flex flex-col gap-2 flex-1">
        <h3 class="forn-bold text-xl flex justify-between">
            <a href="{{route('profile.view',$tweet->owner->id)}}">{{$tweet->owner->name}}</a>
            <div class="flex items-center gap-2">
                <span class=" block text-xs text-blue-600 font-bold">{{ $tweet->created_at->diffForHumans()}}</span>
                @can('delete',$tweet)
                <form action="{{route('tweet.destroy',$tweet->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class='text-red-500'>
                        <svg class="w-4 text-red-500" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" class="w-4 text-red-500" stroke="none" stroke-width="1" fill="fill-current" fill-rule="evenodd">
                                <g id="icon-shape">
                                    <path d="M2,2 L18,2 L18,4 L2,4 L2,2 Z M8,0 L12,0 L14,2 L6,2 L8,0 Z M3,6 L17,6 L16,20 L4,20 L3,6 Z M8,8 L9,8 L9,18 L8,18 L8,8 Z M11,8 L12,8 L12,18 L11,18 L11,8 Z" id="Combined-Shape"></path>
    
                                </g>
                            </g>
                            </svg>
                    </button>
                </form>
                @endcan
                
            </div>
                

            
            
        </h3>
        
        <p class="text-gray-500 text-sm">
            {{$tweet->body}}
        </p>
        @if ($tweet->image_url)
            
        
        <img src={{asset('storage/'.$tweet->image_url)}} alt="" class="w-full object-cover h-48">
        @endif
        <div class="flex items-center gap-4 mt-2">
            <x-like-dislike-form :tweet="$tweet" />
            
        </div>
    </div>
    

</div>
<hr>