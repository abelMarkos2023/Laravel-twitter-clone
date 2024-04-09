<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight flex justify-between">
            <img src="{{asset('twitter.png')}}" class="w-12 h-12 rounded-full object-contain" alt="">
            <span class="text-4xl text-blue-400 capitalize">timeline</span>
        </h2>
    </x-slot> --}}

    @include('partials.publish_tweet')
    @include('partials.timeline')
</x-app-layout>
