<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Article') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-4">
                        <label for="title" class="block text-gray-700">Title:</label>
                        <input type="text" id="title" name="title" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="author" class="block text-gray-700">Author:</label>
                        <input type="text" id="author" name="author" class="w-full border-gray-300 rounded-md" required>
                    </div>
                    <div class="mb-4">
                        <label for="content" class="block text-gray-700">Content:</label>
                        <textarea id="content" name="content" class="w-full border-gray-300 rounded-md" rows="5" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label for="image" class="block text-gray-700">Image:</label>
                        <input type="file" id="image" name="image" class="w-full">
                    </div>
                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
