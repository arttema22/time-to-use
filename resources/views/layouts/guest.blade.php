<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">
    <div style="background:url({{ config('app.url') . '/storage/bg_01.jpg' }}) no-repeat center;background-size:cover"
        class="py-64 px-1 md:px-8 text-center relative text-white font-bold text-2xl md:text-3xl overflow-auto">
        {{-- <h1 class="pb-4">{{__('All starts Search')}}</h1>
        <div class="w-11/12 md:w-3/4 lg:max-w-3xl m-auto">
            <div class="relative z-30 text-base text-black">
                <input type="text" value="" placeholder="Keyword"
                    class="mt-2 shadow-md focus:outline-none rounded-2xl py-3 px-6 block w-50">
                <input type="text" value="" placeholder="Keyword"
                    class="mt-2 shadow-md focus:outline-none rounded-2xl py-3 px-6 block w-20">
                <div
                    class="text-left absolute top-10 rounded-t-none rounded-b-2xl shadow bg-white divide-y w-full max-h-40 overflow-auto">
                </div>
            </div>
        </div> --}}
    </div>

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>

    @livewireScripts
</body>

</html>