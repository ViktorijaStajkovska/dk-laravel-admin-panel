<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="col-span-4">
        <div id="card" class="p-4">

            <h1
                class="animation xl:text-5xl md:text-4xl text-2xl font-semibold leading-tight text-center text-gray-800 sm:mb-0 mb-12">
                Wlcome {{auth()->user()->name}}
            </h1>
            <div class="md:mt-14 mt-4 relative sm:flex items-center justify-center">
                <img src="https://i.ibb.co/KjrPCyW/map.png" alt="world map image "
                    class="w-full xl:h-full h-96 object-cover object-fill sm:block hidden" />
                <img src="https://i.ibb.co/SXKj9Mf/map-bg.png" alt="mobile-image"
                    class="sm:hidden -mt-10 block w-full h-96 object-cover object-fill absolute z-0" />
                <div
                    class="shadow-lg xl:p-6 p-4 sm:w-auto w-full bg-white text-center rounded-lg sm:absolute relative z-20 sm:mt-0 mt-4 left-0 xl:ml-56 sm:ml-12 xl:-mt-40 sm:-mt-12">
                    <i class="fa-solid fa-users text-red-500 fa-xl"></i>
                    <p id="allApplications" class="count text-3xl font-semibold text-gray-800 mt-3"></p>
                    <p class=" leading-4 xl:mt-4 mt-2 text-gray-600">All applications for donation</p>
                </div>
                <div
                    class="shadow-lg xl:p-6 p-4 w-48 sm:w-auto w-full text-center rounded-lg bg-white sm:absolute relative z-20 sm:mt-0 mt-4 xl:mt-80 sm:mt-56 xl:-ml-0 sm:-ml-12">
                    <i class="fa-solid fa-user-check text-red-500 fa-xl"></i>
                    <p id="activeApplications" class="count text-3xl font-semibold text-gray-800 mt-3"></p>
                    <p class=" leading-4 xl:mt-4 mt-2 text-gray-600">Active applications for donation</p>
                </div>
                <div
                    class="shadow-lg xl:p-6 p-4 sm:w-auto w-full bg-white rounded-lg sm:absolute text-center relative z-20 md:mt-0 sm:-mt-5 mt-4 right-0 xl:mr-56 sm:mr-24">
                    <i class="fa-solid fa-face-smile text-red-500 fa-xl"></i>
                    <p id="donations" class="count text-3xl  font-semibold text-gray-800 mt-3"></p>
                    <p class=" leading-4 xl:mt-4 mt-2 text-gray-600">Complited donations</p>
                </div>
                <div
                    class="shadow-lg xl:p-6 p-4 sm:w-auto w-full text-center rounded-lg max-w-5xl bg-white sm:absolute relative z-20 sm:mt-0 mt-5 right-0 xl:mr-56 sm:mr-24 sm:top-0 xl:top-3">
                    <i class="fa-solid fa-handshake text-red-500 fa-xl"></i>
                    <p id="partners" class="count text-3xl font-semibold text-gray-800 mt-3"></p>
                    <p class=" leading-4 xl:mt-4 mt-2 text-gray-600">Partners</p>
                </div>

            </div>
        </div>
    </div>
    @section('script')
    <script>
    $(document).ready(function() {
        var bearerToken = "1|FRZVcfXaAnfrGfhdyyG2LITEJQGst5o7XGVVGmZF";
        $.ajax({
            url: "{{ route('api.allApplications') }}",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + bearerToken
            },
            success: function(data) {
                $("#allApplications").each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: data.allApplications
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            }
        });
        $.ajax({
            url: "{{ route('api.activeApplications') }}",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + bearerToken
            },
            success: function(data) {
                $('#activeApplications').each(function() {
                    $(this).prop('Counter', 0).animate({
                        Counter: data.activeApplications
                    }, {
                        duration: 1000,
                        easing: 'swing',
                        step: function(now) {
                            $(this).text(Math.ceil(now));
                        }
                    });
                });
            }
        });
        $.ajax({
            url: "{{ route('api.completedDonations') }}",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + bearerToken
            },
            success: function(data) {
                $("#donations").prop('Counter', 0).animate({
                    Counter: data.completedDonations
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
        });
        $.ajax({
            url: "{{ route('api.partnersCount') }}",
            type: "GET",
            headers: {
                'Authorization': 'Bearer ' + bearerToken
            },
            success: function(data) {
                $("#partners").prop('Counter', 0).animate({
                    Counter: data.partnersNumber
                }, {
                    duration: 1000,
                    easing: 'swing',
                    step: function(now) {
                        $(this).text(Math.ceil(now));
                    }
                });
            }
        });
    });
    </script>
    @endsection
</x-app-layout>