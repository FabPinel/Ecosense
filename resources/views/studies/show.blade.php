<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $study->title }}</h1>
        <form action="{{ route('studies.follow', $study->id) }}" method="POST">
            @csrf
            <x-primary-button 
                class="{{ auth()->user()->studyUsers()->where('study', $study->id)->exists() ? 'bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:ring-red-500' : 'bg-gray-800' }}">
                {{ auth()->user()->studyUsers()->where('study', $study->id)->exists() ? 'Ne plus suivre' : 'Suivre' }}
            </x-primary-button>
        </form>        
        <p class="text-gray-500 mb-4">{{ $study->description }}</p>
        <p class="mb-4">{{ $study->text }}</p>
        <img src="{{ asset('storage/images/' . $study->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg">
        <p class="mt-4 text-gray-700">Catégorie : {{ $study->category }}</p>
        <p class="text-sm text-gray-500">Publié le : {{ $study->created_at->format('d/m/Y') }}</p>
    </div>
</x-app-layout>