<x-layout>
    <section class="px-6 py-8">
        <x-panel class="max-w-sm mx-auto">
            <form action="/admin/posts" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="title"
                           class="block mb-2 uppercase font-bold text-xs text-gry-700"
                    >

                        Title
                    </label>

                    <input type="text"
                           class="border border-gray-400 p-2 w-full"
                           name="title"
                           id="title"
                           value="{{old('title')}}"
                           required
                    >
                    @error('title')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="excerpt"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Excerpt
                    </label>

                    <textarea name="excerpt" id="excerpt"
                                class="border border-gray-400 p-2 w-full"
                              required
                    >{{old('excerpt')}}</textarea>

                    @error('excerpt')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>
                <div class="mb-6">
                    <label for="body"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                       Body
                    </label>

                    <textarea name="body" id="body"
                              class="border border-gray-400 p-2 w-full"
                              required
                    >{{old('body')}}</textarea>

                    @error('body')
                    <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

{{--                <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">--}}
{{--                    <x-category-dropdown/>--}}
{{--                </div>--}}
                <div class="mb-6">
                    <label for="category_id"
                           class="block mb-2 uppercase font-bold text-xs text-gray-700"
                    >
                        Category
                    </label>

                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{$category->id}}"
                                    {{old('category_id')==$category->id?'selected':''}}
                            >
                                {{ucwords($category->name)}}
                            </option>
                        @endforeach
                    </select>

                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{$message}}</p>
                    @enderror
                </div>

                <x-submit-button>Publish</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
