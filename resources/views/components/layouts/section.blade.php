<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <wireui:scripts />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <title>{{ $title ?? 'Page Title' }}</title>
    @livewireStyles
</head>

@php
    $brand = App\Models\Brand::first();
@endphp

<body x-data="{ open: false }" x-cloak class="bg-gray-50">
    <div class="mx-auto max-w-7xl relative flex h-16 justify-center items-center">
        <div class="flex items-center">
            <a href="{{ route('login') }}">
                <img class="h-16 w-auto mt-5"
                    src="{{ isset($brand->logo) ? asset('uploads/' . $brand->logo) : 'https://api.dicebear.com/7.x/big-smile/svg' }}
                " alt="Logo">
            </a>
        </div>
    </div>

    <div class="relative isolate overflow-hidden">
        <div class="mx-auto max-w-full text-center py-8">
            <h2 class="text-2xl font-bold text-gray-900 sm:text-3xl px-2">{{ $brand->app_name ?? 'App name' }}
            </h2>
        </div>
    </div>

    <x-notifications />

    <x-alerts />

    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>

    <div class="mx-auto flex justify-center items-center ">
        @yield('content')
    </div>

    @livewireScripts
</body>

</html>
