<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>VMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans text-gray-900 antialiased relative min-h-screen overflow-hidden">

    <!-- Background Image -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('images/bg.jpg') }}" alt="Background" class="w-full h-full object-cover opacity-30">
    </div>

    <!-- Content -->
    <div class="relative z-10 min-h-screen flex flex-col justify-center items-center px-4">
        <!-- Logo -->
        <div class="mb-4">
            <a href="/" wire:navigate>
                <img src="{{ asset('images/vote.png') }}" alt="Logo" class="w-24 h-24 mx-auto">
            </a>
        </div>

        <!-- Main Card -->
        <div class="w-full sm:max-w-md bg-white/90 backdrop-blur-md shadow-xl rounded-2xl p-8">
            {{ $slot }}
        </div>
    </div>

</body>
</html>
