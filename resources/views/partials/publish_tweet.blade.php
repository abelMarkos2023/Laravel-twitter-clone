<div class="border border-blue-400 rounded-2xl py-2 px-8"">
    <form enctype='multipart/form-data' action="{{route('tweets.store')}}" method='POST'>
        @csrf
        <textarea placeholder="What's up doc!" name="body" id="" class="w-full border-none p-4 focus:outline-none"></textarea>
        <hr class="my-3">
        <div class="flex justify-between items-center " >
            <a href="{{route('profile.view',auth()->user())}}">
                <img src="{{auth()->user()->getAvatarPath()}}" alt="" class="w-16 h-16  rounded-full object-contain flex-shrink-0" />

            </a>
            <div class="flex items-center gap-4">
                <input class="hidden" type="file" name="image_url" id="image_url" accept="image/*">
                
                <label for="image_url" class="flex items-center gap-2 border border-gray-300 rounded-xl shadow-xl py-2 px-4 cursor-pointer">
                    <svg class="w-4  text-gray-400" viewBox="0 0 20 20" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
						<g id="Page-1" stroke="none" stroke-width="1" fill="fill-current" fill-rule="evenodd">
							<g id="icon-shape">
								<path d="M13,10 L13,16 L7,16 L7,10 L2,10 L10,2 L18,10 L13,10 Z M0,18 L20,18 L20,20 L0,20 L0,18 Z" id="Combined-Shape"></path>
							</g>
						</g>
						</svg>
                        Upload Image
                </label>
                @error('image_url')
                    <span class="text-red-400 text-sm">{{$message}}</span>
                @enderror
                <button class="bg-blue-500 px-4 py-2 text-white border-none rounded-xl shadow-xl cursor-pointer">Tweet-a-roo!</button>
            </div>

            
        </div>
    </form>
    @error('body')
        <span class="text-red-600 text-sm italic my-2 block">{{$message}}</span>
    @enderror
</div>