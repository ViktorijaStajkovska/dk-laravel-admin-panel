<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.5/flowbite.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="//fonts.googleapis.com/css?family=Abril+Fatface|Droid+Serif:400,700,400italic,700italic" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/jquery.dataTables.min.css">
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://kit.fontawesome.com/e9f2acde2e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body class="font-sans antialiased mix-blend-multiply  bg-red-50  bg-slate-50 text-xs md:text-base">
<div class="body">
    <div class="flex justify-center  md:ml-44 mb-10">
        <p class="dotes border-b-4 border-dotted border-red-500 text-transparent w-full  block mt-10 relativ  transparent">.</p>
        <img src="{{asset('./img/logo.png')}}" class="absolute mb-10" alt="logo">

    </div>

    <div class="grid grid-cols-6">
        <div class="sm:col-span-2 sm:col-start-1 w-full">
            
            @include('layouts.side-bar')
        </div>


        <!-- Page Content -->
        <div class="sm:col-span-6  col-span-4 m-3 mr-10 lg:col-start-2  sm:col-start-3 ">
            <main>
                {{ $slot }}
            </main>
        </div>
    </div>
</div>
    @include('layouts.scripts')
    @yield('script')
    @yield('scripts')
</body>

</html>