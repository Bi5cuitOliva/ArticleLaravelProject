@extends('layouts.front')

@section('meta')
    <meta name="description" content="{{ $article->title }}">
@endsection

@section('title')
    <title>{{ $article->title }}</title>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
    <p class="text-gray-600 mb-6">By {{ $article->author }}</p>
    <img src="{{ $article->image_path ? asset('storage/' . $article->image_path) : asset('images/placeholder.jpg') }}"
         alt="{{ $article->title }}"
         class="w-full h-auto rounded mb-6">
    <div class="text-gray-700 leading-relaxed">
        {!! nl2br(e($article->content)) !!}
    </div>
</div>
@endsection
