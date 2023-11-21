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
    </head>
    <body class="font-sans bg-mediumdarkgreen antialiased">
        <div class="min-h-screen font-normal container">
            <div>
                <img src="{{ asset('images/hero_1.png') }}"/>
            </div>
            <main>
                <div class="text-lightgreen">
                    @component('components.navbar')
                    @endcomponent
                    <h1 class="text-8xl font-serif mt-20">
                        Bart de Ruiter<br> Kappers
                    </h1>
                    <p class="text-lg mt-4">
                        Bart de Ruiter Kappers is dé bestemming voor diegenen die <br> streven naar 
                        perfectie in hun kapsel. 
                    </p>
                </div>
                <div class="mt-10">                    
                    @component('components.button')
                    @endcomponent
                </div>
            </main>
        </div>
    </body>
</html>
