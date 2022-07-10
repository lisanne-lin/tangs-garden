<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" type="image/x-icon" href="/favicon.ico">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>{{ config('app.name', 'Ho Wan Loi') }}</title>
    </head>
    <body>
        @include('layouts.navigation')

        <header class="bg-red-50 flex">
            <div class="flex-1 py-24 lg:py-[15vh]">
                <div class="lg:max-w-[620px] ml-auto p-4">
                    <h1 class="text-3xl md:text-5xl font-semibold mb-4 text-gray-900">
                        Welkom Bij Chinees Indisch Afhaalcentrum <br>
                        "Tang's Garden"
                    </h1>
                    <p class="text-emerald-400 mb-8 text-xl">
                        maandag t/m zaterdag van 16.00-21.00 uur
                        zon- en feestdagen van 16.00-22.00 uur
                        <br><br>
                        Erasmusplein 10, 4834 AD Breda
                    </p>
                    <p>
                        <a href="tel:{{ env('USER_PHONE') }}" class="inline-block rounded-full bg-red-500 p-4 px-6 text-white hover:bg-red-600 transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline" viewBox="0 0 20 20" fill="currentColor">
                                <path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z" />
                              </svg>
                            Bel nu
                        </a>
                        <a href="/menu" class="inline-block ml-4 text-red-500">
                            Naar menu
                        </a>
                    </p>
                </div>
            </div>
            <div class="hidden lg:block flex-1 bg-[url('/img/header.jpeg')] bg-cover bg-center"></div>
        </header>
        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 my-16 grid grid-cols-1 md:grid-cols-2 gap-12">
            <div class="hidden md:block">
                <div class="w-full h-[380px] bg-[url('/img/header.jpeg')] bg-cover bg-center nice-shadow rounded-md"></div>
            </div>
            <div class="prose">
                <h2>Ons verhaal</h2>
                <p class="text-gray-600">
                    Sinds juni 2013 runt het echtpaar Li en Lin het restaurant. Ze hebben vele verbeteringen doorgevoerd. Desalniettemin vragen ze de vaste klanten om ook met hen mee te denken en suggesties te doen voor verbeteringen in de kaart.
                    <br><br>
                    Alle ingrediënten zijn van topkwaliteit en zijn vers bereid. Het gebruik van kruiden is erg persoonsgebonden. U zult de verfijnde smaak van de kok vast proeven in de gerechten. 
                </p>
            </div>
        </main>

        @include('layouts.footer')
    </body>
</html>
