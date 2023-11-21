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
<body class="font-sans bg-darkgreen antialiased overflow-x-hidden">
    <div class="min-h-screen font-normal">
        <main>
            <div class="container">
                <div class="text-lightgreen">
                    @component('components.navbar')
                    @endcomponent
                </div>
            </div>
                <div id="appointment" class="h-screen mt-5">
                    <div class="container py-10 flex">
                        <img class="rounded-xl w-2/4 " src="{{ URL('images/hero_1.jpg') }}"/>
                        <div class="flex-row ml-10 text-lightgreen">
                            <h1 class="text-8xl mb-10 font-serif">
                                Over ons
                            </h1>
                            <p class=" text-xl mb-4">
                                Bart de Ruiter Kappers is dé bestemming voor diegenen die streven naar 
                                perfectie in hun kapsel. 
                            </p>
                                
                            </div>
                        </div>
                        <div class="bg-mediumgreen">
                            <div class="container flex py-24">
                                <div class="flex-row text-darktwogreen mr-10">
                                <h1 class="text-8xl mb-10 font-serif">
                                    Onze locatie
                                </h1>
                                <p class=" text-xl mb-4">
                                    Bart de Ruiter Kappers is dé bestemming voor diegenen die streven naar 
                                    perfectie in hun kapsel. 
                                </p>
                                   
                                </div>
                                    <img class="rounded-xl w-2/4 " src="{{ URL('images/hero_1.jpg') }}"/>
                            </div>  
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>
