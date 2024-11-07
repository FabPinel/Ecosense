<x-app-layout>
    <div x-data="{ open: false }" class="py-12 pt-4 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg pt-4 pb-4">
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
                        <h2 class="text-2xl font-bold mb-4">Ajouter un évènement</h2>
                        <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div>
                                <x-input-label for="title" :value="__('Titre')" />
                                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" />
                            </div>

                            <div class="mb-4">
                                <x-input-label for="description" class="block text-sm font-medium text-gray-700">Description</x-input-label>
                                <x-textarea
                                    name="description"
                                    id="description"
                                    rows="4"
                                    class="w-full border-gray-300 rounded-lg p-2 mt-1"
                                ></x-textarea>
                            </div>

                            <div class="mb-4">
                                <x-input-label for="event_date" class="block text-sm font-medium text-gray-700">Date de l'événement</x-input-label>
                                <input
                                    type="date"
                                    name="event_date"
                                    id="event_date"
                                    class="block mt-1 w-full border-gray-300 rounded-lg p-2"
                                    required
                                />
                            </div>

                            <div>
                                <x-input-label for="location" :value="__('Adresse')" />
                                <x-text-input id="location" class="block mt-1 w-full" type="text" name="location" />
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
                        <h2 class="text-pretty text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Tous les évènements</h2>
                        <p class="mt-2 text-lg/8 text-gray-600">Rejoignez des initiatives pour un avenir plus vert 🌱 et récoltez des points 🏅 à chaque participation. Que ce soit pour des actions locales ou des événements en ligne, chaque geste compte pour la planète et pour vous !"</p>
                        @foreach ($events as $event)
                            <a href="{{ route('events.show', $event->id) }}" class="group block mt-16 space-y-20 lg:mt-20 lg:space-y-20 transition shadow-md transform hover:translate-y-1 hover:shadow-lg">
                                <article class="relative isolate flex flex-col gap-8 lg:flex-row rounded-2xl shadow-lg bg-white">
                                    <div class="relative aspect-[16/9] sm:aspect-[2/1] lg:aspect-square lg:w-64 lg:shrink-0">
                                        <img src="{{ asset('storage/images/' . $event->image) }}" alt="" class="absolute inset-0 h-full w-full rounded-2xl bg-gray-50 object-cover">
                                        <div class="absolute inset-0 rounded-2xl ring-1 ring-inset ring-gray-900/10"></div>
                                    </div>
                                    <div>
                                        <div class="group relative max-w-xl">
                                            <div class="flex items-center gap-x-4">
                                                <time datetime="{{ $event->event_date }}" class="text-green-500">{{ $event->formatted_event_date }} | {{ $event->location }}</time>
                                            </div>
                                            <h3 class="mt-3 text-lg/6 font-semibold text-gray-900 group-hover:text-gray-600">
                                                <span class="absolute inset-0"></span>
                                                {{ $event->title }}
                                            </h3>
                                            <p class="mt-5 text-sm/6 text-gray-600">{{ $event->description }}</p>
                                        </div>
                                        <div class="flex items-center gap-x-4 text-xs mt-4">
                                            {{ $event->participants_count }} participant(s)
                                        </div>                                        
                                    </div>
                                </article>
                            </a>                        
                        @endforeach                    
                      </div>
                    </div>
                </div>                  
            </div>
        </div>
    </div>
</x-app-layout>
