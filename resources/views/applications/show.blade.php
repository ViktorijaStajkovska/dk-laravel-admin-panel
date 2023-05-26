<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    @if(Session::has('success'))
    <div class="bg-green-100  border border-green-400 text-green-700 px-4 py-3 mb-20 rounded relative" role="success">
        <span class="block sm:inline"> {{ Session::get('success') }}</span>
    </div>
    @endif
    <div
        class="relative max-w-md mx-auto  md:max-w-2xl  min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16  mr-72">
        <div class="px-6 mt-36">
            <div class="flex flex-wrap justify-center">
                <div class="w-full flex justify-center">
                    <div class="relative">
                        <img src="{{ asset('./img/user.png') }}"
                            class="shadow-xl bg-gray-300 rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                    </div>
                </div>
            </div>
            <div class="">


                <div class="w-full text-center mt-20 ">
                    <div class="md:flex  justify-center lg:pt-4 pt-8 pb-0 ">
                        <div class="p-3 text-center">
                            <span
                                class="text-l font-bold block uppercase tracking-wide text-slate-700">{{$application->email}}</span>
                            <span class="md:text-sm text-slate-400">email</span>
                        </div>
                        <div class="p-3 text-center">
                            <span
                                class="text-l font-bold block uppercase tracking-wide text-slate-700">{{$application->phone}}</span>
                            <span class="md:text-sm text-slate-400">phone</span>
                        </div>

                        <div class="p-3 text-center">
                            <span
                                class="text-l font-bold block uppercase tracking-wide text-slate-700">{{$application->applicationType->name}}</span>
                            <span class="md:text-sm text-slate-400">application type</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <h3 class=" text-xl md:text-2xl text-slate-700 font-bold leading-normal mb-1">{{$application->name}}
                    {{$application->surname}}</h3>
                <div class="md:text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                    <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{$application->city}}
                </div>
            </div>
            <div class="flex justify-end mx-3 ">
                <a data-tooltip-target="edit" data-tooltip-style="light"
                    class="mr-3 text-solid   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  py-2.5 text-center "
                    href="{{ route('applications.edit', $application) }}"><i
                        class="fa-solid fa-pen-to-square fa-lg"></i></a>
                <div id="edit" role="tooltip"
                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                    Edit
                    <div class="tooltip-arrow" data-popper-arrow></div>
                </div>

                <form action="{{ route('applications.destroy', $application) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button data-tooltip-target="delete" data-tooltip-style="light"
                        class="md:text-solid   focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  py-2.5 text-center"><i
                            class="fa-solid fa-trash fa-lg"></i></button>
                    <div id="delete" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 md:text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                        Delete
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                </form>
            </div>
            <div class="mt-6 py-6 border-t border-slate-200 r">
                <div class="md:flex justify-around text-center">
                    <div class="p-3 md:w-2/4">
                        @foreach($application->computerEquipments as $computerEquipment)
                        <span
                            class=" font-bold block uppercase tracking-wide text-slate-700">{{$computerEquipment->name}}</span>
                        @endforeach
                        <span class="md:text-sm text-slate-400">I am applicationg for:</span>
                    </div>
                    <div class="p-3 md:w-2/4 ">
                        @if(!empty($application->donation->donation_name))
                        <p class=" font-bold block uppercase tracking-wide text-slate-700">
                            {{$application->donation->donation_name}}</p>
                        <span class="md:text-sm text-slate-400">Donated</span>
                        @else
                        <a href="{{route('donations.create')}}"
                            class=" font-bold block uppercase hover:text-red-500 tracking-wide text-slate-700">
                            Add donation</a>
                        <span class="md:text-sm text-slate-400">Donated</span>
                        @endif
                    </div>
                </div>
                <div class="md:flex justify-around text-center">
                    <div class="p-3 md:w-2/4">
                        <span @if($application->application_status_id != null)
                            class=" font-bold block uppercase tracking-wide
                            text-slate-700">{{$application->applicationStatus->name}}</span>
                        @else
                        <p class="font-bold text-slate-700">Add application status</p>
                        @endif
                        <span class="md:text-sm text-slate-400">Curent application status</span>
                    </div>
                    <div class="p-3 md:w-2/4">
                        <a class="md:text-sm mb-3 block text-slate-400" target=”_blank”
                            href="{{ asset('storage/' . $application->attachment1) }}"><i
                                class="md:text-lg  text-gray-800 fa-solid fa-file-lines fa-beat"></i> attachment1</a>
                        @if(!empty($application->attachment2))

                        <a class="md:text-sm  block text-slate-400" target=”_blank”
                            href="{{ asset('storage/' . $application->attachment2) }}"><i
                                class="md:text-lg  text-gray-800 fa-solid fa-file-lines fa-beat"></i> attachment2</a>
                        @endif
                    </div>
                </div>
                <div class="flex flex-wrap justify-center text-center">
                    <div class="w-full px-4">
                        <p class="font-light mt-10 leading-relaxed text-slate-600 mb-4">{{$application->description}}
                        </p>
                        <form class="space-y-6 border-t border-slate-200" id="application-form"
                            action="{{ route('applicationStatus.update', $application)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <label for="application_status_id"
                                class="block mb-2 md:text-sm font-medium text-gray-900 dark:text-white">
                                Application Statuse</labelapplication_status_id>
                                <select id="application_status_id"
                                    class=" cursor-pointer mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500  rounded-md shadow-sm"
                                    type="text" name="application_status_id" value="{{old('application_status_id')}}"
                                    autocomplete="application_status_id">
                                    <option selected="true" disabled="disabled">Choose</option>
                                    @foreach ($application_statuses as $application_status)
                                    <option class="text-xs md:text-base" value="{{ $application_status->id }}"
                                        @selected(@old('application_status')==$application_status->
                                        id)>{{ $application_status->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <button type="submit" id="submit-button"
                                    class="w-full mt-3 text-white bg-red-500 hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg md:text-sm px-3 py-1 text-center">Submith</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-app-layout>