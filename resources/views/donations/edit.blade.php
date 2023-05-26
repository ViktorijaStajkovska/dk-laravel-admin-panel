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


            </div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-gray-700 text-base text-xl px-6 pb-4 border-b">Edit donation</div>
                        <form class="space-y-6" id="application-form" action="{{ route('donations.update', $donation)}}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div>
                                <label for="application_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Application type</label>
                                <select id="application_id"
                                    class=" cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm"
                                    type="text" name="application_id" value="{{old('application_id')}}"
                                    autocomplete="application_id">
                                    <option selected="true" disabled="disabled">Choose</option>
                                    @foreach ($applications as $application)
                                    <option value="{{ $application->id }}" value="{{ $application->id }}"
                                        @selected($donation->application_id==$application->id)>{{ $application->name }}
                                        {{ $application->surname }} - {{ $application->applicationType->name }}
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
                                    type="text" name="donation_name"
                                    value="old('donation_name', $donation->donation_name)" required autofocus
                                    autocomplete="donation_name">{{old('donation_name', $donation->donation_name)}}</textarea>
                                @error('donation_name')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <button type="submit" id="submit-button"
                                class="w-full mt-3 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-1 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submith</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>