<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>{{ config('app.name', 'Laravel') . " | Menukaart" }}</title>
    </head>
    <body>
        @include('layouts.navigation')

        <main class="max-w-2xl mt-12 mx-auto text-center">
            <h1 class="text-4xl text-red-500 font-medium">Menukaart</h1>
            <p class="text-gray-500">website in the making</p>
            @if (sizeof($sorted_menu_items))
                @foreach ($sorted_menu_items as $key => $menu_items)
                    <h2 class="text-xl mt-8 mb-2 text-gray-700 text-left font-semibold">{{ ucfirst($key) }}</h2>
                    <div class="relative overflow-x-auto border border-red-100 sm:rounded-lg">
                        <table class="w-full text-left text-gray-500">
                            <thead class="text-xs text-red-50 bg-red-500">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Nummer
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Naam
                                    </th>
                                    <th scope="col" class="px-6 py-3 text-right">
                                        Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu_items as $menu_item)
                                    <tr class="border-t border-red-100 odd:bg-white even:bg-red-50">
                                        <th scope="row" class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                            {{ $menu_item->number }}{{ $menu_item->letter }}
                                        </th>
                                        <td class="px-6 py-4">
                                            <b class="text-gray-700">{{ $menu_item->name }}</b>
                                            @if ( $menu_item->description )
                                                <br>
                                                {{ $menu_item->description }}
                                            @endif
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            €{{ number_format($menu_item->price, 2, ',', '.') }}
                                        </td>
                                    </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                @endforeach
            @else
                No menu items
            @endif

            @if ($page_text)
                <section class="mt-12 text-left">
                    {!! $page_text->body !!}
                </section>
            @endif
        </main>
    </body>
</html>
