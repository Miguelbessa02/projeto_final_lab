<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Itravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

         <!-- Scripts -->
         @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="antialiased">
        
        <div class="hover:bg-gray-300 h-screen">
            @if (Route::has('login'))
                <div class="hover:bg-gray-300 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="mx-auto mt-16 max-w-7xl p-6 text-center">
                <h1 class="text-5xl font-semibold text-gray-900 dark:text-white mt-10">Seja bem-vindo ao Itravel</h1>
                <div class="quote-container mt-10 max-w-md mx-auto p-4 bg-white dark:bg-gray-800 rounded-lg shadow-2xl">
                    <p class="quote-text text-gray-600 text-lg">"Viajar é a única coisa que podes comprar e que te faz mais rico."</p>
                </div>
            </div>

        </div>
        
        
    </body>
    
</html>