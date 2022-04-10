<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white">
                    <h1 class="text-2xl">Welcome back {{ Auth::user()->name }}</h1>
                </div>

                <form action="{{ route('menu') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Order
                                number</label>
                            <input type="text" id="number" name="number"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('number') border-2 border-red-500 bg-red-200 text-red-800 @enderror"
                                placeholder="10b">
                            @error('number')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('name') border-2 border-red-500 bg-red-200 text-red-800 @enderror"
                                placeholder="Bami">
                            @error('name')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                            <input type="number" id="price" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('price') border-2 border-red-500 bg-red-200 text-red-800 @enderror"
                                placeholder="20,00">
                            @error('price')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="category"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Select food
                                category</label>
                            <select id="countries" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('category') border-2 border-red-500 bg-red-200 text-red-800 @enderror">
                                <option value="">Select Type</option>
                                <option value="idk">idk</option>
                                <option value="idk">idk2</option>
                                <option value="idk">idk3</option>
                                <option value="idk">idk4</option>
                            </select>
                            @error('category')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-6">
                        <label for="description"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Item
                            description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 @error('description') border-2 border-red-500 bg-red-200 text-red-800 @enderror"
                            placeholder="Description..."></textarea>
                        @error('description')
                            <p class="text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit"
                        class="text-white bg-red-500 hover:bg-red-700 transition-colors focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add
                        item</button>
                </form>

                @if ($menu_items->count())
                    <div class="relative overflow-x-auto rounded-lg mt-12 border border-gray-200">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 border">
                            <thead
                                class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Number
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Category
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Price
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        <span class="sr-only">Edit</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu_items as $menu_item)
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row"
                                            class="px-6 py-4 font-medium text-gray-900 dark:text-white whitespace-nowrap">
                                            {{ $menu_item->number }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $menu_item->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $menu_item->category_id }}
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $menu_item->price }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <a href="#"
                                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    There are no menu items
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
