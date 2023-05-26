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
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 mb-3 rounded relative"
                    role="success">
                    <span class="block sm:inline"> {{ Session::get('success') }}</span>
                </div>
                @endif
                <div id="success-message"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-3">
                </div>

            </div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <form class="space-y-6" id="application-form" action="{{ route('donations.store')}}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div>

                                <label for="application_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Applicant</label>
                                <select id="application_id"
                                    class=" cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm"
                                    type="text" name="application_id" value="{{old('application_id')}}"
                                    autocomplete="application_id">
                                    <option selected="true" disabled="disabled">Choose</option>
                                    @foreach ($applications as $application)
                                    <option value="{{ $application->id }}" @selected(@old('application')==$application->
                                        id)>{{ $application->name }} {{ $application->surname }} -
                                        {{$application->applicationType->name}}
                                    </option>
                                    @endforeach
                                </select>
                                @error('application_id')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div>
                                <label for="donation_name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Donation</label>
                                <textarea cols="30" rows="3" id="donation_name"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" name="donation_name" value="old ('donation_name')" autofocus
                                    autocomplete="donation_name">{{old('donation_name')}}</textarea>

                                @error('donation_name')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <button type="submit" id="submit-button"
                                class="w-full mt-3 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 text-center ">Submith</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

</x-app-layout>