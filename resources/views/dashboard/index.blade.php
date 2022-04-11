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
                
                @if($categories->count())
                <form action="{{ route('menu') }}" method="POST" class="mt-6">
                    @csrf
                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Menu
                                    number</label>
                                <input type="text" id="number" name="number"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('number') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                    placeholder="10" value="{{ old('number') }}">
                                @error('number')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="letter" class="block mb-2 text-sm font-medium text-gray-900">Menu
                                    letter</label>
                                <input type="text" id="letter" name="letter"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('letter') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                    placeholder="b" value="{{ old('letter') }}">
                                @error('letter')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                            <input type="text" id="name" name="name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                placeholder="Bami" value="{{ old('name') }}">
                            @error('name')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 md:gap-6">
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="price" class="block mb-2 text-sm font-medium text-gray-900">Price</label>
                            <input type="text" id="price" name="price"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('price') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                placeholder="20,00" value="{{ old('price') }}">
                            @error('price')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="relative z-0 mb-6 w-full group">
                            <label for="category" class="block mb-2 text-sm font-medium text-gray-900">Select food
                                category</label>
                            <select id="category" name="category"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('category') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror">
                                <option value="">Select Type</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" @if(old('category') == $category->id) selected @endif>{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div class="mb-6">
                        <label for="description" class="block mb-2 text-sm font-medium text-gray-900">Item
                            description</label>
                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 @error('description') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                            placeholder="Description...">{{ old('description') }}</textarea>
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
                        <table class="w-full text-sm text-left text-gray-500 border">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700">
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
                                            {{ $menu_item->number }}{{ $menu_item->letter }}
                                        </th>
                                        <td class="px-6 py-4">
                                            {{ $menu_item->name }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @if ($menu_item->category)
                                                {{ $menu_item->category->name }}
                                            @else
                                                Not defined
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $menu_item->price }}
                                        </td>
                                        <td class="px-6 py-4 text-right">
                                            <form data-form-id="{{ $menu_item->id }}" action="{{ route('menu/', $menu_item) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="confirmDelete({{ $menu_item->id }})" class="font-medium text-red-600 dark:text-red-500 hover:underline"><svg xmlns="http://www.w3.org/2000/svg" viewBox="-3 -2 24 24" width="24" fill="currentColor"><path d="M6 2V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h4a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-.133l-.68 10.2a3 3 0 0 1-2.993 2.8H5.826a3 3 0 0 1-2.993-2.796L2.137 7H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h4zm10 2H2v1h14V4zM4.141 7l.687 10.068a1 1 0 0 0 .998.932h6.368a1 1 0 0 0 .998-.934L13.862 7h-9.72zM7 8a1 1 0 0 1 1 1v7a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v7a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z"></path></svg></button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="mt-4">
                        There are no menu items
                    </div>
                @endif
                @else
                    <div class="mt-4">
                        <h2 class="mb-4 text-gray-600">Start by adding a category</h2>
                        <a href="{{ route('dashboard/settings') }}"
                            class="text-white bg-red-500 hover:bg-red-700 transition-colors focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Add categorie</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</x-app-layout>
