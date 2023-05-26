<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        @if(Session::has('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative" id="success"
            role="success">
            <span class="block sm:inline"> {{ Session::get('success') }}</span>
        </div>
        @endif
        <div id="success-message"
            class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-3">
        </div>
        <button
            class="block text-white  bg-red-600 hover:bg-red-700 mt-10 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-3 py-2 text-center "
            type="button"><a href="{{route('applications.create')}}">Add new Application</a>
        </button>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="mb-4">
                        <button id="dropdownBgHoverButton" data-dropdown-toggle="dropdownBgHover"
                            class="text-white bg-gray-700 hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-4 py-2.5 text-center inline-flex items-center "
                            type="button">Filter<svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M19 9l-7 7-7-7"></path>
                            </svg></button>

                        <!-- Dropdown menu -->
                        <div id="dropdownBgHover" class="z-10 hidden w-48 bg-white rounded-lg shadow dark:bg-gray-700">
                            <ul class="p-3 space-y-1  text-gray-700 dark:text-gray-200"
                                aria-labelledby="dropdownBgHoverButton">
                                <li>
                                    <div class="block items-center p-2 rounded  ">
                                        @foreach($application_statuses as $status)
                                        <label class="flex  items-center hover:bg-gray-100">
                                            <input type="checkbox" class="status-checkbox r-2"
                                                value="{{ $status->name }}">
                                            <span class="ml-2">{{ $status->name }}</span>
                                        </label>
                                        @endforeach
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="archive-checkbox" value="Archived">
                                            <span class="ml-2">Archived</span>
                                        </label>
                                    </div>
                                </li>
                                <li>
                                    <div
                                        class="flex items-center pl-2 rounded hover:bg-gray-100 dark:hover:bg-gray-600">
                                        <label class="inline-flex items-center">
                                            <input type="checkbox" class="archive-checkbox" value="Not Archive">
                                            <span class="ml-2">Not Archived</span>
                                        </label>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="overflow-x-auto">
                        <table id="applicationsTable" class="table-auto w-full display responsive nowrap">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2">#</th>
                                    <th class="px-4 py-2">Name</th>
                                    <th class="px-4 py-2">Surname</th>
                                    <th class="px-4 py-2">Computer/Equipment</th>
                                    <th class="px-4 py-2">Application type</th>
                                    <th class="px-4 py-2">Application status</th>
                                    <th class="px-4 py-2 hidden">Application status</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>

                        </table>
                    </div>
                </div>
            </div>
</x-app-layout>