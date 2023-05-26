<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="success">
            <span class="block sm:inline">{{ Session::get('success') }}</span>
        </div>
        @endif
    </div>

    <div class="ml-auto p-4">
        <div class="flex justify-end mb-6 m-3">
            <a class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-4 rounded"
                href="{{ route('blogs.create') }}">Create Blog</a>
        </div>

        <div class="grid gap-6 grid-cols-1 md:grid-cols-2 lg:grid-cols-3 mb-3">
            @foreach ($blogs as $blog)
            <div class="relative bg-white rounded-lg shadow-md">
                <div class="relative">
                    <img class="object-cover object-top w-full h-48 rounded-t-lg"
                        src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->title }}">
                    <p class="absolute bottom-0 left-0 bg-red-500 text-white px-4 py-2">{{ $blog->category->name }}</p>
                </div>
                <div class="p-4">
                    <h5 class="mb-2 text-2xl font-semibold text-gray-900">{{ $blog->title }}</h5>
                    <div class="text-sm text-gray-700 overflow-x-auto h-24">
                        <p>{{ $blog->text }}</p>
                    </div>
                    <p class="mt-3 text-xs text-gray-600">{{ $blog->created_at->format('d / m / Y') }}</p>
                </div>
                <div class="flex justify-end p-4">
                    <a data-tooltip-target="edit" data-tooltip-style="light"
                        class="mr-3 mt-1 text-gray-600 hover:text-gray-900" href="{{ route('blogs.edit', $blog) }}">
                        <i class="fa-solid fa-pen-to-square fa-lg"></i>
                    </a>
                    <div id="edit" role="tooltip"
                        class="absolute bg-opacity-40 z-10 invisible inline-block   text-sm font-medium text-gray-900 bg-white p-1 rounded-lg shadow-sm opacity-0 tooltip">
                        Edit
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>
                    <form action="{{ route('blogs.destroy', $blog) }}" method="POST">
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
            @endforeach
        </div>

        {{ $blogs->links() }}
    </div>
</x-app-layout>