<x-app-layout>
    <div x-data="{ open: false }" class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Formation") }}
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
                        <h2 class="text-2xl font-bold mb-4">Ajouter une Formation</h2>
                        <form action="{{ route('studies.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="__('Titre')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" />
                            </div>

                            <div>
                                <x-input-label for="description" :value="__('Description')" />
                                <x-text-input id="description" class="block mt-1 w-full" type="text" name="description" />
                            </div>

                            <div>
                                <x-input-label for="time" :value="__('Temps de lecture en minutes')" />
                                <x-text-input id="time" class="block mt-1 w-full" type="text" name="time" />
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

                            <div>
                                <x-input-label for="video" :value="__('Vidéo')" />
                                <x-text-input id="video" class="block mt-1 w-full" type="text" name="video" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="category" class="block text-sm font-medium text-gray-700">Catégorie</x-input-label>
                                <x-select name="category" :options="['Transport' => 'Transport', 'Zéro déchets' => 'Zéro déchets', 'Climat' => 'Climat']" />
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-sm font-medium text-gray-700">Images</label>
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
                <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                    @foreach ($studies as $study)
                        <a href="{{ route('studies.show', $study->id) }}" class="group block">
                            <div aria-hidden="true"
                                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                <img src="{{ asset('storage/images/' . $study->image) }}"
                                    class="h-52 w-96 object-cover object-center">
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $study->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                {{ Str::limit($study->description, $limit = 160, $end = '...') }}
                            </p>
                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{$study->category}}</span>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
