@extends('layouts.front')

@section('meta')
    <meta name="description" content="A collection of articles">
@endsection

@section('title')
    <title>Articles</title>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($articles as $article)
        <div class="bg-white p-4 rounded shadow hover:shadow-lg transform hover:-translate-y-1 transition">
            <a href="{{ $article->url }}">
                <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('images/placeholder.jpg') }}"
                     alt="{{ $article->title }}"
                     class="w-full h-48 object-cover rounded mb-4">
            </a>
            <h2 class="text-lg font-semibold">
                <a href="{{ $article->url }}" class="hover:text-blue-500">
                    {{ $article->title }}
                </a>
            </h2>
            <p class="text-gray-600 text-sm">{{ $article->author }}</p>
            <p class="mt-2 text-gray-700">{{ Str::limit($article->content, 100) }}</p>
        </div>
        @endforeach
    </div>

    <!-- Pagination -->
    <div class="mt-6">
        {{ $articles->links() }}
    </div>
</div>
@endsection
