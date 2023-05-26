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
    class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white w-full mb-6 shadow-lg rounded-xl mt-16">
        <div class="px-6 mt-20">
            <div class="flex flex-wrap justify-center">
                <div class="w-full flex justify-center">
                    <div class="relative">
                        <img src="{{ asset('./img/user.png') }}"
                            class="shadow-xl bg-gray-300 rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                    </div>
                </div>

                <div class="w-full text-center mt-20">
                    <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                        <div class="p-3 text-center">
                            <span
                                class="text-l font-bold block uppercase tracking-wide text-slate-700">{{$volunteer->email}}</span>
                            <span class="text-sm text-slate-400">email</span>
                        </div>
                        <div class="p-3 text-center">
                            <span
                                class="text-l font-bold block uppercase tracking-wide text-slate-700">{{$volunteer->phone}}</span>
                            <span class="text-sm text-slate-400">phone</span>
                        </div>

                        
                    </div>
                </div>
            </div>
            <div class="text-center mt-2">
                <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$volunteer->name}}</h3>
                <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                    <i class="fas fa-map-marker-alt mr-2 text-slate-400 opacity-75"></i>{{$volunteer->city}}
                </div>
            </div>
            <div class="flex justify-end mx-3 ">
                <form action="{{ route('volunteers.destroy', $volunteer) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button data-tooltip-target="delete" data-tooltip-style="light"
                        class="text-solid  hover:text-lg focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm  py-2.5 text-center"><i class="fa-solid fa-trash fa-lg"></i></button>
                    <div id="delete" role="tooltip"
                        class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg shadow-sm opacity-0 tooltip">
                        Delete
                        <div class="tooltip-arrow" data-popper-arrow></div>
                    </div>

                </form>
            </div>
            <div class="mt-6 py-6 border-t border-slate-200 r">
                <div class="p-3 ">
                    
                    <span
                        class="text-base font-bold block uppercase tracking-wide text-slate-700">{{$volunteer_position->name}}</span>
                   
                    <span class="text-sm text-slate-400">volunteer position</span>
                </div>
               

                <div class="p-3 ">
                    <a class="text-sm mb-3 block text-slate-400" target=”_blank”
                        href="{{ asset('storage/' . $volunteer->attachment) }}"><i
                            class="text-lg  text-gray-800 fa-solid fa-file-lines fa-beat"></i> attachment</a>
                </div>
                <div class="flex flex-wrap justify-center text-center">
                    <div class="w-full px-4">
                        <p class="font-light leading-relaxed text-slate-600 mb-4">{{$volunteer->description}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


</x-app-layout>