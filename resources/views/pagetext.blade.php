<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
    <title>{{ $page_text->title . ' | ' .  config('app.name', 'Tangs Garden') }}</title>
</head>

<body>
    @include('layouts.navigation')

    <main class=" flex">
        <div class="flex-1 hidden lg:block bg-cover bg-center h-auto max-w-[750px] {{ ($page_text->slug == 'maandaanbieding') ? 'bg-[url(/img/maandaanbieding.jpg)]' : 'bg-[url(/img/contact.jpg)]' }} "></div>
        <div class="flex-none sm:flex-1 py-24 lg:py-[15vh] mx-auto {{ ($page_text->slug == 'maandaanbieding') ? 'sm:flex-none' : 'flex-1' }}">
            <div class="lg:max-w-[620px] p-4">
              
                <h1 class="text-4xl sm:text-5xl font-medium px-4 mb-12 {{ ($page_text->slug == 'maandaanbieding') ? 'text-center' : 'text-left' }}">{!! $page_text->title !!}</h1>
        
                @if ($page_text)
                    <section class="mt-4 mb-12 text-left prose px-4">
                        {!! $page_text->body !!}
                    </section>
                @endif
                @if ($page_text->slug == 'contact')
            <div class="px-4 mb-12">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2482.67248360279!2d5.065213515743295!3d51.519224417659565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47c6beefae9f4d57%3A0x322bdffdf4cd5877!2sTang&#39;s%20Garden!5e0!3m2!1sen!2snl!4v1658010476428!5m2!1sen!2snl" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        @endif
            </div>
        </div>

    </main>

    @include('layouts.footer')
</body>

</html>
