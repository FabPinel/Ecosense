<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-500 mb-4">{{ $article->description }}</p>
        <p class="mb-4">{{ $article->text }}</p>
        <img src="{{ asset('storage/images/' . $article->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg">
        <p class="mt-4 text-gray-700">Catégorie : {{ $article->category }}</p>
        <p class="text-sm text-gray-500">Publié le : {{ $article->created_at->format('d/m/Y') }}</p>

        

        <!-- Formulaire de commentaire -->
        <form action="{{ route('articles.storeComment', $article->id) }}" method="POST" class="mt-4">
            @csrf
            <textarea name="comment" id="comment" rows="5" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm/6" placeholder="Écris ton commentaire..."></textarea>
            @error('comment')
                <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
            @enderror
            <div class="mt-2 flex justify-end">
                <button type="submit" class="inline-flex items-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">
                    Envoyer
                </button>
            </div>
        </form>
        <div class="mt-6">
            <h2 class="text-xl font-bold">Commentaires</h2>
            @foreach($article->comments as $comment)
                <div class="mt-4 p-4 border rounded-md">
                    <p><strong>{{ $comment->user }}</strong></p> <!-- Nom de l'utilisateur du commentaire -->
                    <p>{{ $comment->comment }}</p>
                    <p class="text-sm text-gray-500">Publié le : {{ $comment->created_at->format('d/m/Y') }}</p>
                </div>
            @endforeach

        </div>
    </div>
</x-app-layout>
