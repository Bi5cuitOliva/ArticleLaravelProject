<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Favorite') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ __('My Favorite Articles') }}</h3>

                    @if(count($favorites) == 0)
                        <p>{{ __('No favorite articles yet.') }}</p>
                    @else
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($favorites as $article)
                                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                                    <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-48 object-cover">
                                    <div class="p-4">
                                        <h4 class="font-bold text-xl mb-2">{{ $article->title }}</h4>
                                        <p class="text-gray-600 mb-2">By {{ $article->author }}</p>
                                        <p class="text-gray-700">{{ Str::limit($article->content, 200) }}...</p>
                                        <a href="{{ route('articles.show', $article->id) }}" class="text-blue-500 hover:text-blue-700">Read More</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
