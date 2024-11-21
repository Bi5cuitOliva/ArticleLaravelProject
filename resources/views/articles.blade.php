@extends('layouts.front')

@section('meta')
<meta name="description" content="my articles">
{{-- ... --}}
@endsection

@section('title')
     <title>Articles</title>
@endsection


@section('style')
     <style>

     </style>
@endsection

@section('content')
<div class="container mx-auto p-6">
    <h1 class="text-2xl font-bold mb-6">Articles</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        @foreach($articles as $article)
        <div class="bg-white p-4 rounded shadow">
            <img src="{{ asset('storage/' . $article->image_path) }}" alt="{{ $article->title }}" class="mb-4 rounded">
            <h2 class="text-lg font-semibold">{{ $article->title }}</h2>
            <p class="text-gray-600">{{ $article->author }}</p>
            <p class="mt-2">{{ Str::limit($article->content, 100) }}</p>
        </div>
        @endforeach
    </div>
</div>

@endsection


@section('script')
<script>
    //script
</script>
@endsection

