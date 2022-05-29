<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ 'Menukaart' . ' | ' . config('app.name', 'Ho Wan Loi') }}</title>
</head>

<body class="bg-[url('/img/bg_pattern.svg')] bg-center bg-repeat-y">
    @include('layouts.navigation')

    <main class="max-w-4xl mt-12 mx-auto text-center min-h-screen px-4">
        <h1 class="text-4xl text-red-500 font-medium">Menukaart</h1>
        @if (sizeof($sorted_menu_items))
            <div class="flex justify-between">

                <div class="w-full pr-4">
                    @foreach ($sorted_menu_items as $key => $menu_items)
                        <h2 id="{{ str_replace(' ', '-', $key) }}"
                            class="text-xl mt-8 mb-2 text-gray-700 text-left font-semibold">{{ ucfirst($key) }}</h2>
                        <div class="relative overflow-x-auto border border-red-100 rounded-lg">
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
                                            <th scope="row"
                                                class="px-6 py-4 font-medium text-gray-700 whitespace-nowrap">
                                                {{ $menu_item->number }}{{ $menu_item->letter }}
                                            </th>
                                            <td class="px-6 py-4">
                                                <b class="text-gray-700">{{ $menu_item->name }}</b>
                                                @if ($menu_item->description)
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
                </div>
                <div class="hidden md:block">
                    <ul
                        class="bg-white nice-shadow border inline-block p-4 rounded-md text-left list-disc list-inside sticky mt-16 top-20 z-10">
                        <h4 class="font-medium text-lg mb-4 text-slate-900">Navigatie</h4>
                        @foreach ($sorted_menu_items as $key => $menu_items)
                            <li class="mb-4">
                                <a href="#{{ str_replace(' ', '-', $key) }}"
                                    class="underline text-gray-700 hover:text-red-500 transition-colors">{{ ucfirst($key) }}
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @else
            No menu items
        @endif

        @if ($page_text)
            <section class="my-12 text-left prose">
                {!! $page_text->body !!}
            </section>
        @endif
    </main>

    @include('layouts.footer')

    <script>
        // scroll to center of clicked link
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                document.querySelector(this.getAttribute('href')).scrollIntoView({
                    behavior: 'smooth',
                    block: 'center'
                });
            });
        });
    </script>
</body>

</html>
