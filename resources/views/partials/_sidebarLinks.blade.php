<ul>

    <li>
        <a href="/dashboard" class="font-bold block text-lg mb-4">
            Home
        </a>
    </li>
    <li>
        <a href="{{route('profile.search')}}" class="font-bold block text-lg mb-4">
            Explore
        </a>
    </li>
    <li>
        <a href="/" class="font-bold block text-lg mb-4">
            Notification
        </a>
    </li>
    <li>
        <a href="/" class="font-bold block text-lg mb-4">
            Message
        </a>
    </li>
    <li>
        <a href="/" class="font-bold block text-lg mb-4">
            Bookmarks
        </a>
    </li><li>
        <a href="/" class="font-bold block text-lg mb-4">
            List
        </a>
    </li><li>
        <a href="{{route('profile.view',auth()->user())}}" class="font-bold block text-lg mb-4">
            Profile
        </a>
    </li>
    <li>
        <a href="/" class="font-bold block text-lg mb-4">
            More
        </a>
    </li>
</ul>