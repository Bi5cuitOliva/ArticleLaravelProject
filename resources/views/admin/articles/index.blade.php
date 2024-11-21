<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 class="text-2xl font-bold mb-4">{{ __('Manage Articles') }}</h3>
                    @section('content')
                    <div class="container mx-auto p-6">
                        <h1 class="text-2xl font-bold mb-6">Manage Articles</h1>
                        <a href="{{ route('admin.articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create Article</a>
                        <table class="min-w-full bg-white mt-6">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4">Title</th>
                                    <th class="py-2 px-4">Author</th>
                                    <th class="py-2 px-4">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($articles as $article)
                                <tr>
                                    <td class="py-2 px-4">{{ $article->title }}</td>
                                    <td class="py-2 px-4">{{ $article->author }}</td>
                                    <td class="py-2 px-4">
                                        <a href="{{ route('admin.articles.edit', $article) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('admin.articles.delete', $article) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endsection
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
