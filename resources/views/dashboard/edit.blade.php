<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __("Edit $menu_item->name") }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="bg-white">
                    <form action="{{ route('dashboard/menu/edit/', $menu_item->id) }}" method="POST" class="mt-6">
                        @csrf
                        @method('PUT')
                        <div class="grid md:grid-cols-2 md:gap-6">
                            <div class="grid md:grid-cols-2 md:gap-6">
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="number" class="block mb-2 text-sm font-medium text-gray-900">Menu
                                        number</label>
                                    <input type="text" id="number" name="number"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('number') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                        placeholder="10" value="{{ (old('number')) ? old('number') : $menu_item->number }}">
                                    @error('number')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="relative z-0 mb-6 w-full group">
                                    <label for="letter" class="block mb-2 text-sm font-medium text-gray-900">Menu
                                        letter</label>
                                    <input type="text" id="letter" name="letter"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('letter') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                        placeholder="b" value="{{ (old('letter')) ? old('letter') : $menu_item->letter }}">
                                    @error('letter')
                                        <p class="text-red-500 mt-1">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="relative z-0 mb-6 w-full group">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Name</label>
                                <input type="text" id="name" name="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-red-500 focus:border-red-500 block w-full p-2.5 @error('name') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                    placeholder="Bami" value="{{ (old('name')) ? old('name') : $menu_item->name }}">
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
                                    placeholder="20,00" value="{{ (old('price')) ? old('price') : $menu_item->price }}">
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
                                        <option value="{{ $category->id }}" @if(old('category') == $category->id || $menu_item->category_id == $category->id ) selected @endif>{{ $category->name }}</option>
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
                                placeholder="Description...">{{ (old('description')) ? old('description') : $menu_item->description }}</textarea>
                            @error('description')
                                <p class="text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
    
                        <button type="submit"
                            class="text-white bg-red-500 hover:bg-red-700 transition-colors focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">Update
                            item</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>