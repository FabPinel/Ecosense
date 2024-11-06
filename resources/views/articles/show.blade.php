<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $article->title }}</h1>
        <p class="text-gray-500 mb-4">{{ $article->description }}</p>
        <p class="mb-4">{{ $article->text }}</p>
        <img src="{{ asset('storage/images/' . $article->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg">
        <p class="mt-4 text-gray-700">Catégorie : {{ $article->category }}</p>
        <p class="text-sm text-gray-500">Publié le : {{ $article->created_at->format('d/m/Y') }}</p>
    </div>
    <form action="#" class="max-w-lg mx-auto">
        <div>
            <div class="group flex items-center" aria-orientation="horizontal" role="tablist">
                <div class="ml-auto hidden items-center space-x-5 group-has-[*:first-child[aria-selected='true']]:flex">
                    <div class="flex items-center">
                        <button type="button" class="-m-2.5 inline-flex h-10 w-10 items-center justify-center rounded-full text-gray-400 hover:text-gray-500">
                            <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                                <path d="M12.232 4.232a2.5 2.5 0 0 1 3.536 3.536l-1.225 1.224a.75.75 0 0 0 1.061 1.06l1.224-1.224a4 4 0 0 0-5.656-5.656l-3 3a4 4 0 0 0 .225 5.865.75.75 0 0 0 .977-1.138 2.5 2.5 0 0 1-.142-3.667l3-3Z" />
                                <path d="M11.603 7.963a.75.75 0 0 0-.977 1.138 2.5 2.5 0 0 1 .142 3.667l-3 3a2.5 2.5 0 0 1-3.536-3.536l1.225-1.224a.75.75 0 0 0-1.061-1.06l-1.224 1.224a4 4 0 1 0 5.656 5.656l3-3a4 4 0 0 0-.225-5.865Z" />
                            </svg>
                        </button>
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <div id="tabs-1-panel-1" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-1" role="tabpanel" tabindex="0">
                    <label for="comment" class="sr-only">Comment</label>
                    <div>
                        <textarea rows="5" name="comment" id="comment" class="block w-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-green-600 sm:text-sm/6" placeholder="Écris ton commentaire..."></textarea>
                    </div>
                </div>
                <div id="tabs-1-panel-2" class="-m-0.5 rounded-lg p-0.5" aria-labelledby="tabs-1-tab-2" role="tabpanel" tabindex="0">
                </div>
            </div>
        </div>
        <div class="mt-2 flex justify-end">
            <x-primary-button class="inline-flex items-center rounded-md bg-green-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600">Envoyer</x-primary-button>
        </div>
    </form>
</x-app-layout>
