<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-500 mb-4">{{ $article->description }}</p>
        <p class="mb-4">{{ $article->text }}</p>
        <img src="{{ asset('storage/images/' . $article->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg">
        <p class="mt-4 text-gray-700">Catégorie : {{ $article->category }}</p>
        <p class="text-sm text-gray-500">Publié le : {{ $article->created_at->format('d/m/Y') }}</p>
    </div>
</x-app-layout>