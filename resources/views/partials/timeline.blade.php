<div class="border border-gray-300 rounded-xl mt-4 p-4 flex flex-col gap-4">
    @forelse (auth()->user()->timeline() as $tweet )
        
    
  @include('partials.tweet')

  @empty
  <h2 class="text-center font-bold text-2xl">There Are No Tweets Yet.</h2>
  @endforelse
</div>