<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>SEMS</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.2.1/flowbite.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet"/>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/5.11.3/main.min.js"></script>

    <style>
        [x-cloak] {
            display: none;
        }

        .background-farm {
            background-image: url('{{ asset('images/farm.jpg') }}');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            filter: brightness(0.7);
        }

        /* Match Livewire Blue Color Scheme */
        .bg-primary {
            background-color: #2563eb; /* Tailwind blue-600 */
        }

        .bg-secondary {
            background-color: #3b82f6; /* Tailwind blue-500 */
        }

        .text-primary {
            color: #2563eb;
        }

        .text-secondary {
            color: #3b82f6;
        }

        .nav-link {
            color: #bfdbfe; /* Tailwind blue-200 */
        }

        .nav-link:hover {
            color: #1e40af; /* Tailwind blue-800 */
        }

        .nav-logo {
            color: #3b82f6; /* Tailwind blue-500 */
        }
    </style>


    @vite(['resources/css/app.css', 'resources/js/app.js'])
    {{-- @wireUiScripts --}}
</head>

<body class="font-sans antialiased h-full bg-no-repeat bg-cover ">

    <nav class="bg-primary border-gray-200">
        <div class="flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="{{ asset('images/vote.png') }}" alt="Violation Photo" class="w-16 h-16 border-2 rounded-full">
                <label for="" class="font-black text-white text-2xl nav-logo">SEMS </label>
            </a>
            <button data-collapse-toggle="navbar-default" type="button" class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-200 rounded-lg md:hidden hover:bg-secondary focus:outline-none focus:ring-2 focus:ring-gray-200" aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h15M1 7h15M1 13h15"/>
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0">
                    <li>
                        <a href="" class="block py-2 px-3 text-white uppercase font-bold nav-link">Home</a>
                    </li>
                    <li>
                        {{-- <a href="{{ route('servi') }}" class="block py-2 px-3 text-white uppercase font-bold nav-link">Services</a> --}}
                    </li>



                    {{-- <li>
                        <a href="" class="block py-2 px-3 text-white uppercase font-bold nav-link">To Rate</a>
                    </li> --}}

                    {{-- <li>
                        <a href="{{ route('mess') }}" class="block py-2 px-3 text-white uppercase font-bold nav-link">Chats</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('logout') }}" class="block py-2 px-3 text-white uppercase font-bold bg-red-500 rounded">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="border-gray-200  dark:border-gray-700 ">
        <main>
            {{ $slot }}
        </main>
    </div>

    @livewireScripts
</body>

</html>
