<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <script src="{{ asset('js/app.js') }}" defer></script>
        <title>{{ config('app.name', 'Laravel') }}</title>
    </head>
    <body>
        @include('layouts.navigation')

        <main class="max-w-2xl mt-12 mx-auto text-center">
            <h1 class="text-4xl font-medium">Ho-wan-loi resto</h1>
            <p class="text-gray-600">website in the making</p>
            <p>test</p>
        </main>
    </body>
</html>
