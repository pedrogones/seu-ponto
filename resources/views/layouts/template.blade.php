<html>

<head>
    <title>
        Seu Ponto
    </title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="h-full">
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <!-- Mobile menu button-->
                    <button type="button"
                        class="relative inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu" aria-expanded="false">
                        <span class="absolute -inset-0.5"></span>
                        <span class="sr-only">Open main menu</span>
                        <!--
                      Icon when menu is closed.

                      Menu open: "hidden", Menu closed: "block"
                    -->
                        <svg class="block h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                        </svg>
                        <!--
                      Icon when menu is open.

                      Menu open: "block", Menu closed: "hidden"
                    -->
                        <svg class="hidden h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
                <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <a href="{{ route('dashboard') }}" @class([
                                'rounded-md px-3 py-2 text-base font-medium',
                                'bg-gray-900 text-white' => request()->routeIs('dashboard'),
                                'text-gray-300 hover:bg-gray-700 hover:text-white"' => !request()->routeIs(
                                    'dashboard'),
                            ]) aria-current="page">Home</a>

                            @can('user_view')
                                <a href="{{ route('users.index') }}" @class([
                                    'rounded-md px-3 py-2 text-base font-medium',
                                    'bg-gray-900 text-white' => request()->routeIs('users.*'),
                                    'text-gray-300 hover:bg-gray-700 hover:text-white"' => !request()->routeIs(
                                        'users.*'),
                                ])>Usuarios</a>
                            @endcan

                            @if (!auth()->user()->hasRole('User'))
                                <a href="{{ route('posts.index') }}" @class([
                                    'rounded-md px-3 py-2 text-base font-medium',
                                    'bg-gray-900 text-white' => request()->routeIs('posts.*'),
                                    'text-gray-300 hover:bg-gray-700 hover:text-white"' => !request()->routeIs(
                                        'posts.*'),
                                ])>Posts</a>
                            @endif
                            @if (auth()->user()->hasRole('Super Admin'))
                                <a href="{{ route('roles.index') }}" @class([
                                    'rounded-md px-3 py-2 text-base font-medium',
                                    'bg-gray-900 text-white' => request()->routeIs('roles.*'),
                                    'text-gray-300 hover:bg-gray-700 hover:text-white"' => !request()->routeIs(
                                        'permissions.*'),
                                ])>Funções</a>
                            @endif
                            <a href="{{ route('bater-ponto.index') }}" @class([
                                'rounded-md px-3 py-2 text-base font-medium',
                                'bg-gray-900 text-white' => request()->routeIs('bater-ponto.*'),
                                'text-gray-300 hover:bg-gray-700 hover:text-white"' => !request()->routeIs(
                                    'bater-ponto.*'),
                            ])>Registrar ponto</a>


                        </div>
                    </div>
                </div>
                <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">


                    <div class="relative ml-1">
                        <p class="rounded-md px-3 py-2 text-base font-medium text-gray-300 hover:text-white">
                            {{ Auth::user()->name }}
                        </p>
                    </div>
                    <!-- Profile dropdown -->
                    <div x-data="{ dropdownProfile: false }" class="relative ml-3">
                        <div>
                            <button @click="dropdownProfile = !dropdownProfile" type="button"
                                class="relative flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                                <span class="absolute -inset-1.5"></span>
                                <span class="sr-only">Open user menu</span>
                                <img class="h-8 w-8 rounded-full" src={{ Auth::user()->photoProfile }} alt="">
                            </button>
                        </div>
                        <div style="margin-top:25px" x-show="dropdownProfile"
                            class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                            tabindex="-1">
                            <div
                                class="w-auto rounded-lg border-2 border-indigo-500 bg-transparent p-4 text-center shadow-lg dark:bg-gray-800">
                                <figure
                                    class="mx-auto mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-indigo-500 dark:bg-indigo-600">
                                    <img src="{{ Auth::user()->photoProfile }}">
                                </figure>
                                <h2 class="mt-4 text-xl font-bold text-indigo-600 dark:text-indigo-400">
                                    {{ Auth::user()->name }}</h2>
                                <p class="mb-4 text-gray-600 dark:text-gray-300">{{ Auth::user()->email }}</p>
                                <div class="flex items-center justify-center">
                                    <button title="Fechar" @click="dropdownProfile = !dropdownProfile"
                                        class="rounded-full bg-gray-600 px-4 py-2 text-white hover:bg-gray-700 dark:bg-gray-400 dark:hover:bg-indigo-500"
                                        style="margin-right: 15px">

                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="m15 9-6 6m0-6 6 6m6-3a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                        </svg>
                                    </button>
                                    <a title="Sair" href="{{ route('logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('form-logout').submit()"
                                        class="rounded-full bg-indigo-600 px-4 py-2 text-white hover:bg-indigo-700 dark:bg-indigo-400 dark:hover:bg-indigo-500">
                                        <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M18 14v4.8a1.2 1.2 0 0 1-1.2 1.2H5.2A1.2 1.2 0 0 1 4 18.8V7.2A1.2 1.2 0 0 1 5.2 6h4.6m4.4-2H20v5.8m-7.9 2L20 4.2" />
                                        </svg>
                                    </a>
                                    <form action="{{ route('logout') }}" id="form-logout" class="hidden"
                                        method="POST">
                                        @csrf

                                    </form>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>

            <!-- Mobile menu, show/hide based on menu state. -->
            <div class="sm:hidden" id="mobile-menu">
                <div class="space-y-1 px-2 pb-3 pt-2">
                    <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                    <a href="#" class="bg-gray-900 text-white block rounded-md px-3 py-2 text-base font-medium"
                        aria-current="page">Dashboard</a>
                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Team</a>
                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Projects</a>
                    <a href="#"
                        class="text-gray-300 hover:bg-gray-700 hover:text-white block rounded-md px-3 py-2 text-base font-medium">Calendar</a>
                </div>
            </div>
    </nav>
    @yield('content')
</body>

</html>
