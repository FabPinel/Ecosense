<x-app-layout>
    <div x-data="{ open: false }" class="py-12 pt-4 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4 pb-4 p-4">
                <!-- Bouton pour ouvrir le formulaire modal -->
                @auth
                    <x-add-button 
                        :score="auth()->user()->score" 
                        :role="auth()->user()->role" 
                        @click="open = true" 
                    />
                @endauth

                <!-- Popup de formulaire d'ajout d'article -->
                <div 
                    x-show="open"
                    x-cloak
                    class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50"
                    @click="open = false"
                >
                    <div 
                        class="bg-white p-6 rounded-lg shadow-lg max-w-md w-full"
                        @click.stop
                    >
                        <h2 class="text-2xl font-bold mb-4">Ajouter un Article</h2>
                        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="__('Titre')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="text" class="block text-sm font-medium text-gray-700">Texte</x-input-label>
                                <x-textarea
                                    name="text"
                                    id="text"
                                    rows="4"
                                    class="w-full border-gray-300 rounded-lg p-2 mt-1"
                                ></x-textarea>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="category" class="block text-sm font-medium text-gray-700">Catégorie</x-input-label>
                                <x-select name="category" :options="['Transport' => 'Transport', 'Zéro déchets' => 'Zéro déchets', 'Climat' => 'Climat']" />
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Image</label>
                                <input
                                    type="file"
                                    name="image"
                                    id="image"
                                    class="w-full border-gray-300 rounded-lg p-2 mt-1"
                                />
                            </div>

                            <div class="flex justify-end">
                                <button
                                    type="button"
                                    @click="open = false"
                                    class="bg-gray-500 text-white px-4 py-2 rounded mr-2"
                                >
                                    Annuler
                                </button>
                                <x-primary-button class="ms-3">
                                    {{ __('Ajouter ') }}
                                </x-primary-button>     
                            </div>
                        </form>
                    </div>
                </div>

                <div class="bg-white">
                    <div class="mx-auto max-w-7xl px-6 lg:px-8">
                      <div class="mx-auto max-w-2xl lg:max-w-4xl">
                        <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Tous nos articles</h2>
                        <p class="mt-2 text-lg/8 text-gray-600">Commentez nos articles écologiques 🌱 pour partager vos idées et apprendre davantage sur des sujets comme le climat, la gestion des déchets, et bien plus. Plus vous participez, plus vous gagnez de points 🏆 !</p>
                        <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                            @foreach ($articles as $article)
                            <a href="{{ route('articles.show', $article->id) }}" class="group block mb-6 transition transform hover:translate-y-1 hover:shadow-lg">
                                <div aria-hidden="true"
                                    class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                    <img src="{{ asset('storage/images/' . $article->image) }}"
                                        class="h-52 w-96 object-cover object-center">
                                </div>
                                <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $article->title }}</h3>
                                <p class="mt-2 text-sm text-gray-500">
                                    {{ Str::limit($article->description, $limit = 160, $end = '...') }}
                                </p>
                                <span class="inline-flex items-center rounded-md bg-green-50 px-2 py-1 text-xs font-medium text-green-700 ring-1 ring-inset ring-green-600/20">{{$article->category}}</span>
                            </a>
                        @endforeach
                        </div>             
                      </div>
                    </div>
                </div>     
            </div>

        </div>
    </div>
</x-app-layout>
