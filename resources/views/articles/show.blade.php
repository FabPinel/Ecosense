<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-500 mb-4">{{ $article->description }}</p>
        <p class="mb-4">{{ $article->text }}</p>
        
        <img src="{{ asset('storage/images/' . $article->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg">
        <p class="mt-4 text-gray-700">Catégorie : {{ $article->category }}</p>
        <p class="text-sm text-gray-500">Publié le : {{ $article->created_at->format('d/m/Y') }}</p>
            
        <div x-data="{ isCorrect: null, correctAnswer: '{{ $generatedData['correctAnswer'] }}', answered: false }" class="bg-green-100 p-4 rounded-lg mb-4">
            <h2 class="text-xl font-bold">Question de réflexion :</h2>
            <p>{{ $generatedData['question'] }}</p>
            
            <!-- Answer Options -->
            <div class="mt-4 flex space-x-4">
                <button 
                    @click="if (!answered) { isCorrect = (correctAnswer === 'Oui'); answered = true; }" 
                    x-bind:disabled="answered"
                    class="answer-option p-2 rounded bg-gray-200 hover:bg-gray-300 disabled:bg-gray-300 disabled:cursor-not-allowed">
                    Oui
                </button>
                <button 
                    @click="if (!answered) { isCorrect = (correctAnswer === 'Non'); answered = true; }" 
                    x-bind:disabled="answered"
                    class="answer-option p-2 rounded bg-gray-200 hover:bg-gray-300 disabled:bg-gray-300 disabled:cursor-not-allowed">
                    Non
                </button>
            </div>

            <!-- Display Feedback -->
            <div x-show="isCorrect !== null" class="mt-4 p-2 rounded" :class="isCorrect ? 'bg-green-200' : 'bg-red-200'">
                <p x-text="isCorrect ? 'Correct!' : 'Incorrect!'"></p>
            </div>
        </div>

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
