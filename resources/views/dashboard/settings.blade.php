<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <style>
        .sortable-ghost {
            opacity: .6;
        }
    </style>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/sortable.min.js') }}" defer></script>
    <script src="{{ asset('js/sortable.js') }}" defer></script>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">
        @include('layouts.navigation')

        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Settings
                </h1>
            </div>
        </header>

        <!-- Page Content -->
        <main>
            <div class="py-12">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                        <h2 class="text-2xl">Categories</h2>
                        <div class="grid md:grid-cols-2 md:gap-6 mt-2">
                            <div class="relative z-0 mb-6 w-full group">
                                <div id="items">
                                    @if ($categories->count())
                                        @foreach ($categories as $category)
                                            <div class="w-full bg-white border border-gray-200 px-4 py-2 rounded-lg cursor-grab mb-2">{{ $category->name }}</div>
                                        @endforeach
                                    @else
                                        No categories found
                                    @endif
                                </div>
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <form action="{{ route('/dashboard/settings/category') }}" method="POST">
                                    @csrf
                                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Category
                                        name</label>
                                    <input type="text" id="name" name="name"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                        placeholder="Soep">
                                    @error('name')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror

                                    <button type="submit"
                                        class="text-white bg-red-500 hover:bg-red-700 transition-colors focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-4">Add
                                        category</button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg mt-12">
                        <h2 class="text-2xl">Opening times</h2>
                    </div>

                    <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg mt-12">
                        <h2 class="text-2xl">Deal of the month</h2>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>

</html>
