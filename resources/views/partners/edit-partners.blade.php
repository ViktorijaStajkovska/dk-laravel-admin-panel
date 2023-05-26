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
                        <form method="POST" action="{{ route('partners.update', $partner) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name -->
                            <div>
                                <label for="name">Name</label>
                                <input id="name"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" name="name" value="{{old('name', $partner->name)}}"
                                    autocomplete="name" />
                                @error('name')
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
                                    src="{{ asset('storage/' . $partner->image) }}" alt="">
                                @error('image')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>





                            <!-- Type -->
                            <div class="mt-4 ">
                                <label class="inline-block mr-3" for="type_id">Type</label>
                                <select id="type_id"
                                    class=" cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm"
                                    type="text" name="type_id" value="{{old('type_id')}}" autocomplete="username">
                                    <option selected="true" disabled="disabled">Choose</option>
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @selected($partner->
                                        type_id==$type->id)>{{ $type->name }}</option>
                                    @endforeach
                                </select>

                                @error('type')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>


                            <!-- Web page link-->
                            <div class="mt-4">
                                <label for="link">Web page link</label>
                                <textarea id="link" cols="30" rows="3"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" autofocus autocomplete="name"
                                    name="link">{{old('link', $partner->link)}}</textarea>
                                @error('link')
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