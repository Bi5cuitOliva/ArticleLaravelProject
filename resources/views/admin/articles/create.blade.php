@extends('layouts.app')

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Create Article</h1>
    <form action="{{ route('admin.articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" id="title" name="title" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="author" class="block text-sm font-medium">Author</label>
            <input type="text" id="author" name="author" class="mt-1 block w-full border-gray-300 rounded-md" required>
        </div>
        <div class="mb-4">
            <label for="content" class="block text-sm font-medium">Content</label>
            <textarea id="content" name="content" rows="5" class="mt-1 block w-full border-gray-300 rounded-md" required></textarea>
        </div>
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium">Image</label>
            <input type="file" id="image" name="image" class="mt-1 block w-full border-gray-300 rounded-md">
        </div>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
