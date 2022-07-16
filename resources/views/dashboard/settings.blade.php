<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Settings') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg">
                <h2 class="text-2xl">Categories</h2>
                <div class="grid md:grid-cols-2 md:gap-6 mt-2">
                    <div class="relative z-0 mb-6 w-full group">
                        <form action="{{ route('dashboard/settings/category') }}" method="POST">
                            @csrf
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
                    <div class="relative z-0 mb-6 w-full group">
                        @if ($categories->count())
                            @foreach ($categories as $category)
                                <div
                                    class="w-full bg-white border border-gray-200 px-4 py-2 rounded-lg mb-2 flex items-center justify-between">
                                    {{ $category->name }}
                                    <form data-form-id="{{ $category->id }}"
                                        action="{{ route('dashboard/settings/category/', $category) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="confirmDelete(event, {{ $category->id }})"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"><svg
                                                xmlns="http://www.w3.org/2000/svg" viewBox="-3 -2 24 24" width="24"
                                                fill="currentColor">
                                                <path
                                                    d="M6 2V1a1 1 0 0 1 1-1h4a1 1 0 0 1 1 1v1h4a2 2 0 0 1 2 2v1a2 2 0 0 1-2 2h-.133l-.68 10.2a3 3 0 0 1-2.993 2.8H5.826a3 3 0 0 1-2.993-2.796L2.137 7H2a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h4zm10 2H2v1h14V4zM4.141 7l.687 10.068a1 1 0 0 0 .998.932h6.368a1 1 0 0 0 .998-.934L13.862 7h-9.72zM7 8a1 1 0 0 1 1 1v7a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1zm4 0a1 1 0 0 1 1 1v7a1 1 0 0 1-2 0V9a1 1 0 0 1 1-1z">
                                                </path>
                                            </svg></button>
                                    </form>
                                </div>
                            @endforeach
                        @else
                            No categories found
                        @endif
                    </div>
                </div>
            </div>


            <div class="bg-white p-6 overflow-hidden shadow-sm sm:rounded-lg mt-12">
                <h2 class="text-2xl">Page texts</h2>

                @if ($page_texts->count())
                    <form action="{{ route('dashboard/settings/text') }}" method="POST">
                        @csrf
                        @method('PUT')
                        @foreach ($page_texts as $page_text)
                            <hr class="mt-2 mb-4">
                            <h4 class="text-lg">{{ $page_text->title }}</h4>
                            <div class="mb-6 mt-4">
                                <textarea id="{{ $page_text->slug }}" name="{{ $page_text->slug }}" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-red-500 focus:border-red-500 @error('{{ $page_text->slug }}') bg-red-50 border-red-500 text-red-900 placeholder-red-700 @enderror"
                                    placeholder="{{ $page_text->title }}...">{{ (old('slug')) ? old('slug') : $page_text->body }}</textarea>
                                @error('{{ $page_text->slug }}')
                                    <p class="text-red-500 mt-1">{{ $message }}</p>
                                @enderror
                            </div>
                        @endforeach

                        <button type="submit"
                        class="text-white bg-red-500 hover:bg-red-700 transition-colors focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center mt-4">Save text</button>
                    </form>
                @else
                    <div class="text-gray-600">
                        No texts found
                    </div>
                @endif
            </div>
        </div>
    </div>

    <div class="editor">

    </div>

    <script src="{{ asset('js/ckeditor.js') }}"></script>
    <script>
        @if ($page_texts->count())
            @foreach ($page_texts as $page_text)
                ClassicEditor.create( document.querySelector( '#{{ $page_text->slug }}' ), {
                    licenseKey: '',
                } )
                .then( editor => {
                    window.editor = editor;    
                } )
                .catch( error => {
                    console.error( 'Oops, something went wrong!' );
                    console.error( 'Please, report the following error on https://github.com/ckeditor/ckeditor5/issues with the build id and the error stack trace:' );
                    console.warn( 'Build id: yykzde5l84h5-tuxnet8y7dw8' );
                    console.error( error );
                } );
            @endforeach
        @endif
        
    </script>
</x-app-layout>
