<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="py-1">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-gray-700 text-base text-xl px-6 pb-4 border-b">Edit Blog</div>
                        <form method="POST" action="{{ route('blogs.update', $blog) }}" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Title -->
                            <div>
                                <label for="title">Title</label>
                                <input id="title"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" name="title" value="{{old('title', $blog->title)}}"
                                    autocomplete="name" />
                                @error('title')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>


                            <!-- Image -->
                            <div class="mt-4">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                    for="image">Photo</label>
                                <input
                                    class="block w-full text-sm text-gray-900  rounded cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                    id="image" type="file" name="image" />
                                <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-l-lg"
                                    src="{{ asset('storage/' . $blog->image) }}" alt="">
                                @error('image')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <!-- Category -->
                            <div class="mt-4 ">
                                <label class="inline-block mr-3" for="category_id">Category</label>
                                <select id="category_id"
                                    class=" cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="text" name="category_id" value="{{old('category_id')}}"
                                    autocomplete="username">
                                    <option selected="true" disabled="disabled">Choose</option>
                                    @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @selected($blog->
                                        category_id==$category->id)>{{ $category->name }}</option>
                                    @endforeach
                                </select>

                                @error('category')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <!-- Text-->
                            <div class="mt-4">
                                <label for="text">Text</label>
                                <textarea id="text" cols="30" rows="3"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" autofocus autocomplete="name"
                                    name="text">{{old('text', $blog->text)}}</textarea>
                                @error('text')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit"
                                class="mt-4 bg-red-500 hover:bg-red-600 text-white border border-gray-300 rounded-md p-1">
                                Submit
                                <button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>