<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>




    <div class=" mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="success">
            <span class="block sm:inline"> {{ Session::get('success') }}</span>
        </div>
        @endif

    </div>
    <div class=" ml-auto p-4  ">
        <div class="flex justify-end mb-6">

            <button class="text-xs lg:text-base">
                <a class=" bg-red-600 hover:bg-red-700 text-white  font-bold py-2 px-4 m-8 text-end rounded"
                    href="{{ route('videos.create') }}">Create Video</a>
            </button>
        </div>

        <div class="flex flex-wrap">
            <div class="h-screen flex items-center justify-center">
                <div class="grid grid-cols-12 gap-2 gap-y-4 max-w-6xl">
                    @foreach ($videos as $video)

                    <div class="col-span-12 sm:col-span-6 md:col-span-3">
                        <card class="w-full flex flex-col">
                            <div class="relative">
                                <a href="{{$video->link}}" target="_blank">
                                    <img src="{{ asset('storage/' . $video->image) }}"
                                        class="object-cover w-full h-48 rounded-t-lg" />
                                    <i
                                        class="fa-regular fa-circle-play fa-3x hover:text-gray-950 text-white opacity-60	 absolute inset-0 top-20 text-center"></i>
                                </a>
                            </div>
                            <div class="flex flex-row mt-2 gap-2">
                                <a href="">
                                    <img src="" class="rounded-full max-h-10 max-w-10" />
                                </a>
                                <div clas="flex flex-col">
                                    <p class="text-gray-400 text-xs mt-1">{{ $video->created_at->format('d/m/Y') }}</p>
                                    <div class="flex justify-center ">
                                        <a data-tooltip-target="edit" data-tooltip-style="light"
                                            class="mr-3 mt-1 text-gray-600 hover:text-gray-900"
                                            href="{{ route('videos.edit', $video) }}">
                                            <i class="fa-solid fa-pen-to-square fa-lg"></i>
                                        </a>
                                        <div id="edit" role="tooltip"
                                            class="absolute bg-opacity-40 z-10 invisible inline-block   text-sm font-medium text-gray-900 bg-white p-1 rounded-lg shadow-sm opacity-0 tooltip">
                                            Edit
                                            <div class="tooltip-arrow" data-popper-arrow></div>
                                        </div>
                                        <form action="{{ route('videos.destroy', $video) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button data-tooltip-target="delete" data-tooltip-style="light"
                                                class="text-gray-600 hover:text-gray-900 mt-1">
                                                <i class="fa-solid fa-trash fa-lg"></i>
                                            </button>
                                            <div id="delete" role="tooltip"
                                                class="absolute z-10 invisible inline-block text-sm font-medium text-gray-900 bg-white p-1 bg-opacity-40 rounded-lg shadow-sm opacity-0 tooltip">
                                                Delete
                                                <div class="tooltip-arrow" data-popper-arrow></div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </card>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        {{ $videos->links() }}

    </div>


</x-app-layout>