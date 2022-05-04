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
            <h1 class="text-4xl font-medium">Menu page</h1>
            <p class="text-gray-600">website in the making</p>

            @if ($menu_items->count())
                @foreach ($menu_items as $menu_item)
                    <div>{{ $menu_item->name }}</div>
                @endforeach
            @else
                No menu items
            @endif

            @if ($page_text->count())
                {!! $page_text->body !!}
            @endif
        </main>
    </body>
</html>
