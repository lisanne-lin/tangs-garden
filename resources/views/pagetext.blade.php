<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ $page_text->title . ' | ' .  config('app.name', 'Ho Wan Loi') }}</title>
</head>

<body class="bg-[url('/img/bg_pattern.svg')] bg-center bg-repeat-y">
    @include('layouts.navigation')

    <main class="max-w-2xl mt-6 mx-auto text-center">
        <h1 class="text-4xl text-red-500 font-medium">{!! $page_text->title !!}</h1>
        @if ($page_text)
            <section class="mt-4 mb-12 text-left prose">
                {!! $page_text->body !!}
            </section>
        @endif
    </main>
</body>

</html>
