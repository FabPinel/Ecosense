<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>
        <div class="flex items-center gap-x-4">
            <time datetime="{{ $event->event_date }}" class="text-green-500">{{ $event->formatted_event_date }} | {{ $event->location }}</time>
        </div>
        <a href="https://www.google.com/maps/dir/?api=1&origin=Current+Location&destination={{ urlencode($event->location) }}" target="_blank">
            <x-primary-button class="mt-4 mb-4">
                {{ __('S\'y rendre') }}
            </x-primary-button>
        </a>
        <img src="{{ asset('storage/images/' . $event->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg">
        <p class="text-gray-500 mb-4">{{ $event->description }}</p>
    </div>
</x-app-layout>