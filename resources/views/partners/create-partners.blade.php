<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <div class="py-1">
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                @if(Session::has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative"
                    role="success">
                    <span class="block sm:inline"> {{ Session::get('success') }}</span>
                </div>
                @endif

                <div class="flex justify-end my-5">
                    <!-- Modal toggle -->
                    <button data-modal-target="authentication-modal" data-modal-toggle="authentication-modal"
                        class="block text-white bg-red-600 hover:bg-red-700 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Add new Type
                    </button>
                    @include('types.create-type')
                </div>
            </div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-gray-700 text-base text-xl px-6 pb-4 border-b">Add new Partner</div>
                        <form method="POST" action="{{ route('partners.store') }}" enctype="multipart/form-data">
                            @csrf
                            <!-- Name -->
                            <div>
                                <label for="name">Name</label>
                                <input id="name"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" name="name" value="{{old('name')}}" autocomplete="name" />
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
                                    id="image" type="file" name="image" value="{{old('image')}}" />
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
                                    <option value="{{ $type->id }}" @selected(@old('type')==$type->
                                        id)>{{ $type->name }}</option>
                                    @endforeach
                                </select>

                                <!-- Link -->
                                <div class="mt-4 ">
                                    <label for="link">Web page link</label>
                                    <input id="link"
                                        class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                        type="text" name="link" value="{{old('link')}}" autocomplete="link" />
                                    @error('link')
                                    <div class="text-red-400">
                                        {{ $message }}
                                    </div>
                                    @enderror

                                </div>


                                @error('type')
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