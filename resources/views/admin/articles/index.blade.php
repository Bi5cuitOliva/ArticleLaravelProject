<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Articles') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-6">
                <a href="{{ route('admin.articles.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Create New Article</a>

                <table class="table-auto w-full mt-4">
                    <thead>
                        <tr class="bg-gray-200">
                            <th class="px-4 py-2">#</th>
                            <th class="px-4 py-2">Title</th>
                            <th class="px-4 py-2">Author</th>
                            <th class="px-4 py-2">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($articles as $article)
                        <tr>
                            <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="border px-4 py-2">{{ $article->title }}</td>
                            <td class="border px-4 py-2">{{ $article->author }}</td>
                            <td class="border px-4 py-2 flex items-center space-x-2">
                                <a href="{{ route('admin.articles.edit', $article) }}"
                                    class="bg-blue-500 hover:bg-pink-600 text-white font-semibold py-2 px-4 rounded-full shadow-lg w-24 text-center transition-all transform hover:scale-105">
                                    Edit
                                </a>

                                <form action="{{ route('admin.articles.delete', $article->id) }}" method="POST"
                                    onsubmit="return confirm('Are you sure you want to delete this article?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        class="bg-red-500 hover:bg-red-600 text-white font-semibold py-2 px-4 rounded-full shadow-lg w-24 text-center transition-all transform hover:scale-105">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
