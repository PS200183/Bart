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
<body class="font-sans bg-mediumdarkgreen antialiased overflow-x-hidden">
    <div class="min-h-screen font-normal">
        <main>
            <div class="container">
                <div class="text-lightgreen">
                    @component('components.navbar')
                    @endcomponent
                    
                    <h1 class="text-8xl font-serif mt-20">
                        Bart de Ruiter<br> Kappers
                    </h1>
                    
                    <p class="text-lg mt-4">
                        Bart de Ruiter Kappers is dé bestemming voor diegenen die <br> streven naar perfectie in hun kapsel.
                    </p>
                </div>
                
                <div class="mt-10">
                    <x-button message="Plan een afspraak"/>
                </div>
                
                <div class="absolute -scale-x-100 top-0 z-[-1] w-2/3 h-screen -right-1">
                    <img class="rounded-br-xl" src="{{ URL('images/hero_1.jpg') }}"/>
                </div>
                
                <div>
                    <div class="text-lightgreen mt-72">
                        <h1 class="text-8xl font-serif">
                            Diensten
                        </h1>
                        <p class="text-lg mt-4">
                            Vind hier al onze diensten
                        </p>
                    </div>
                    <div class="bg-darkgreen grid grid-cols-4 rounded-xl h-[578] text-lightgreen">
                        <div class="p-10">
                            <img class="" src="{{ URL('images/hero_1.jpg') }}"/>
                            <h2 class="font-bold font-sans">Knippen</h2>
                            <p>30,-</p>
                        </div>
                        <div class="p-10">
                            <img class="" src="{{ URL('images/hero_1.jpg') }}"/>
                            <h2 class="font-bold font-sans">Baard</h2>
                            <p>30,-</p>
                        </div>
                        <div class="p-10">
                            <img class="" src="{{ URL('images/hero_1.jpg') }}"/>
                            <h2 class="font-bold font-sans">Verven</h2>
                            <p>30,-</p>
                        </div>
                        <div class="p-10">
                            <img class="" src="{{ URL('images/hero_1.jpg') }}"/>
                            <h2 class="font-bold font-sans">Wassen</h2>
                            <p>30,-</p>
                        </div>
                        <div class="p-10"> 
                            <p>Lees meer</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="appointment" class="bg-darkgreen h-screen mt-48">
                <div class="container py-10 flex">
                    <div>
                        <h1 class="text-8xl font-serif mb-10 text-lightgreen">
                            Afspraak
                        </h1>
                        <img class="rounded-xl" src="{{ URL('images/hero_1.jpg') }}"/>
                    </div>
                    @if (Auth::check())
                    <div class="bg-lightgreen rounded-xl ml-10">
                        <div class="p-10">
                           <form action="{{ route('appointments.create') }}" method="POST">
                                @csrf
                                <input
                                type="text"
                                id="name"
                                name="username"
                                class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                                placeholder="Naam">
                                <input
                                type="time"
                                id="time"
                                name="time"
                                class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                                placeholder="Tijd">
                             <input
                                type="date"
                                id="date"
                                name="date"
                                class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                                placeholder="date">
                                
                               
                                <input
                                type="text"
                                id="name"
                                name="services"
                                class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                                placeholder="Dienst">

                                  <x-button type="submit" message="Plan een afspraak"/>
                            </form> 

                            {{-- <x-button message="Plan een afspraak"/> --}}
                        </div>
                    </div>
                </div>
                @else
                <div class="bg-lightgreen rounded-xl ml-10">
                    <div class="p-10">
                        <form action="{{ route('appointments.create') }}" method="POST">
            @csrf
                            <input
                            type="text"
                            id="name"
                            name="input"
                            class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                            placeholder="naam">
                            <input
                            type="text"
                            id="name"
                            name="input"
                            class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                            placeholder="achternaam">
                            <input
                            type="text"
                            id="mail"
                            name="input"
                            class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                            placeholder="Email">
                            <input
                            type="time"
                            id="time"
                            name="input"
                            class="w-full mb-2 px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:border-darkgreen"
                            placeholder="Tijd">

                            
                        </form> 

                        <x-button link="/login" message="Log eerst in!"/>
                    </div>
                @endif
            </div>
        </main>
    </div>
</body>
</html>
