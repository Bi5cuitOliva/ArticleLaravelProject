<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('admin.articles.update', $article) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title:</label>
                        <input type="text" id="title" name="title" value="{{ $article->title }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700">Author:</label>
                        <input type="text" id="author" name="author" value="{{ $article->author }}" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Content:</label>
                        <textarea id="content" name="content" class="w-full border-gray-300 rounded-md" rows="5" required>{{ $article->content }}</textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Image:</label>
                        <input type="file" id="image" name="image" class="w-full">
                        @if ($article->image_path)
                            <p>Current Image: <a href="{{ asset('storage/' . $article->image_path) }}" target="_blank">View</a></p>
                        @endif
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Update</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
