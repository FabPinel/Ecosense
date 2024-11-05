<x-app-layout>
    <div x-data="{ open: false }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Articles") }}
                </div>

                <!-- Bouton pour ouvrir le formulaire modal -->
                <x-add-button class="ms-3" @click="open = true"></x-add-button>

                <!-- Popup de formulaire d'ajout d'article -->
                <div
                    x-show="open"
                    class="fixed inset-0 bg-gray-800 bg-opacity-75 flex items-center justify-center z-50"
                    x-cloak
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
                                <x-select name="category" :options="['Transport', 'Zéro déchets', 'Climat']" />
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
            </div>
        </div>
    </div>
</x-app-layout>
