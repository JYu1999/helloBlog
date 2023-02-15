@auth()
    <x-panel>
        <form action="/posts/{{$post->title}}/comments" method="POST" >
            @csrf
            <header class="flex items-center">
                <img src="https://api.dicebear.com/5.x/adventurer/svg/seed={{auth()->id()}}" alt=""
                     width="40" height="40" class="rounded-xl"
                >
                <h3 class="ml-4">Share your opinions here.</h3>
            </header>

            <div class="mt-8">
                <textarea name="body" class="w-full" id="" cols="30" rows="10" placeholder="your comments"
                              required></textarea>
                @error('body')
                <span class="text-xs text-red-500">{{$message}}</span>
                @enderror
            </div>

            <div class="flex justify-end mt-8">
               <x-form.button>Submit</x-form.button>
            </div>

        </form>
    </x-panel>
@else
    <a href="/register" class="hover:underline text-blue-300">Register</a> or <a href="/login" class="hover:underline text-blue-300">Log in</a> to leave a comment

@endauth
