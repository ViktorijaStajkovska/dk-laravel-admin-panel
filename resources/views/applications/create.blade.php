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
                <div id="success-message"
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative hidden mb-3">
                </div>

            </div>
            <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <div class="text-gray-700 text-base text-xl px-6 pb-4 border-b">Add new Application</div>
                        <form class="space-y-6" id="application-form" action="{{ route('applications.store')}}"
                            method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <label for="name"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="name" value="{{old('name')}}">
                                <div id="error-message-name" class="text-red-400"></div>
                                @error('name')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="surname"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    surname</label>
                                <input type="text" name="surname" id="surname"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="surname" value="{{old('surname')}}">
                                <div id="error-message-surname" class="text-red-400" class="text-red"></div>

                                @error('surname')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    email</label>
                                <input type="email" name="email" id="email"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="email" value="{{old('email')}}">
                                <div id="error-message-email" class="text-red-400"></div>

                                @error('email')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    phone</label>
                                <input type="text" name="phone" id="phone"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="phone" value="{{old('phone')}}">
                                <div id="error-message-phone" class="text-red-400"></div>

                                @error('phone')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="city" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    city</label>
                                <input type="text" name="city" id="city"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="city" value="{{old('city')}}">
                                <div id="error-message-city" class="text-red-400"></div>

                                @error('city')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="attachment1"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    attachment1</label>
                                <input type="file" name="attachment1" id="attachment1"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="attachment1" value="{{old('attachment1')}}">
                                <div id="error-message-attachment1" class="text-red-400"></div>

                                @error('attachment1')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="attachment2"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    attachment2</label>
                                <input type="file" name="attachment2" id="attachment2"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="attachment2" value="{{old('attachment2')}}">
                                @error('attachment2')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="description"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    description</label>
                                <textarea cols="30" rows="3" id="description"
                                    class="border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm block mt-1 w-full"
                                    type="text" name="description" value="old('description')" autofocus
                                    autocomplete="description">{{old('description')}}</textarea>
                                <div id="error-message-description" class="text-red-400"></div>

                                @error('description')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div>

                                <label for="application_type_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    application type</label>
                                <select id="application_type_id"
                                    class=" cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm"
                                    type="text" name="application_type_id" value="{{old('application_type_id')}}"
                                    autocomplete="application_type_id">
                                    <option selected="true" disabled="disabled">Choose</option>
                                    @foreach ($application_types as $application_type)
                                    <option value="{{ $application_type->id }}"
                                        @selected(@old('application_type')==$application_type->
                                        id)>{{ $application_type->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <div id="error-message-application_type" class="text-red-400"></div>

                                @error('application_type_id')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>
                            <div id="content1">

                                <x-input-label for="computer_equipment_id1" :value="__(' Computer')" />
                                <select id="computer_equipment_id1"
                                    class=" multiple-select cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500  focus:ring-indigo-500  rounded-md shadow-sm"
                                    type="text" name="computer_equipment_id[]" value="{{old('computer_equipment_id')}}"
                                    autocomplete="computer_equipment_id" multiple="multiple">>
                                    @foreach ($computer_equipments1 as $computer_equipment)
                                    <option value="{{ $computer_equipment->id }}"
                                        @selected(@old('computer_equipment')==$computer_equipment->
                                        id)>{{ $computer_equipment->name }} </option>
                                    @endforeach
                                </select>
                                <div id="error-message-computer_equipment" class="text-red-400"></div>

                                @error('computer_equipment_id1')
                                <div class="text-red-400">
                                    {{ $message }}
                                </div>
                                @enderror

                            </div>
                            <div id="content2">
                                <x-input-label for="computer_equipment_id" :value="__('Equipment')" />
                                <select id="computer_equipment_id"
                                    class="multiple-select cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm"
                                    type="text" name="computer_equipment_id[]" value="{{old('computer_equipment_id')}}"
                                    autocomplete="category_id" multiple="multiple">
                                    @foreach ($computer_equipments2 as $computer_equipment2)
                                    <option value="{{ $computer_equipment2->id }}"
                                        @selected(@old('computer_equipment2')==$computer_equipment2->
                                        id)>{{ $computer_equipment2->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <div id="error-message-computer_equipment" class="text-red-400"></div>

                                @error('computer_equipment_id')
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
    @section('scripts')
    <script src="{{asset('./js/applications/application-create.js')}}"></script>
    @endsection

</x-app-layout>
