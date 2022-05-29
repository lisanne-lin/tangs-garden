<footer class="p-4 bg-white border-t md:p-6">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 md:flex md:items-center md:justify-between">
        <span class="text-sm text-gray-500 sm:text-center">© {{ date("Y") . ' ' . config('app.name', 'Ho Wan Loi') }}</span>
        <ul class="flex flex-wrap items-center mt-3 text-sm text-gray-500 sm:mt-0">
            <li>
                <a href="/" class="mr-4 hover:underline md:mr-6">home</a>
            </li>
            <li>
                <a href="/menu" class="mr-4 hover:underline md:mr-6">Menu</a>
            </li>
            <li>
                <a href="/maandaanbieding" class="mr-4 hover:underline md:mr-6">Maandaanbieding</a>
            </li>
            <li>
                <a href="/contact" class="mr-4 hover:underline">Contact</a>
            </li>
            @auth
            @else
                <li>
                    <a href="/login" class="hover:underline">{{ __('Login') }}</a>
                </li>
            @endauth
        </ul>
    </div>
</footer>