<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>{{ config('app.name', 'Tangs Garden') }}</title>
    </head>
    <body>
        @include('layouts.navigation')

        <header class="flex">
            <div class="hidden lg:block flex-1 bg-[url('/img/header.jpeg')] bg-cover bg-center"></div>
            <div class="flex-1 py-24 lg:py-[15vh]">
                <div class="lg:max-w-[620px] p-4">
                    <h1 class="text-5xl md:text-7xl mb-8">
                        Tang's Garden
                    </h1>
                    <h3 class="text-xl mb-8">Chinees Specialiteiten Restaurant en Afhaal </h3>
                    <p class="text-slate-800 mb-8 text-sm">
                        Maandag van 16:00 - 21:00 <br>
                        Woensdag  t/m zaterdag 16:00 - 21:30 <br>
                        Zondag van 12:00 - 22:00 
                        
                        <br><br>
                        <div class="mb-8">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="#6B5541" class="bi bi-geo-alt-fill h-5 w-5 inline" viewBox="0 0 16 16">
                                <path d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10zm0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6z"/>
                              </svg>
                       Tilburgseweg 14, 5051 AH Goirle
                        
                        </div>
                    </p>
                    <p>
                        <a href="tel:{{ env('USER_PHONE') }}" class="inline-block main-color p-4 px-6 text-white">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="#fff">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                              </svg>
                            Bel nu
                        </a>
                        <a href="/menu" class="inline-block ml-4">
                            Naar menu
                        </a>
                    </p>
                </div>
            </div>
          
        </header>
        <main class="flex mx-auto px-8 my-40 gap-12 justify-center">
            <div class="text-center h-auto sm:w-2/4 ">
                <h2 class="text-4xl mb-8">Welkom bij Tang's Garden</h2>
                <p class="text-base">
                    Onze keuken biedt u de mogelijkheid om kennis te maken met de originele gerechten uit China. Deze gerechten zijn uit de volgende culinaire keukens samengesteld: <br> <br>
                    Kantoneze keuken Zuid-China <br>
                    Szechuan keuken West-China <br> <br>    
                    Desgewenst zullen we u helpen bij het maken van een keuze, zodat er een harmonieuze samenstelling van de gerechten onstaat. Voor allergenen en andere vragen u ons altijd contact met ons opnemen. We hopen u snel te zien!
                </p>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
