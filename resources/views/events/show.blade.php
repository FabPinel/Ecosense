<x-app-layout>
    <div class="max-w-3xl mx-auto p-6">
        <h1 class="text-3xl font-bold mb-4">{{ $event->title }}</h1>
        <div class="flex items-center gap-x-4">
            <time datetime="{{ $event->event_date }}" class="text-green-500">{{ $event->formatted_event_date }} | {{ $event->location }}</time>
        </div>
        <div class="flex mt-4">
            <a href="https://www.google.com/maps/dir/?api=1&origin=Current+Location&destination={{ urlencode($event->location) }}" target="_blank">
                <x-primary-button class="mr-4">
                    {{ __('S\'y rendre') }}
                </x-primary-button>
            </a>
            <form action="{{ route('events.participate', $event->id) }}" method="POST">
                @csrf
                <x-primary-button 
                    class="{{ auth()->user()->participates()->where('event', $event->id)->exists() ? 'bg-red-500 hover:bg-red-700 focus:bg-red-700 active:bg-red-900 focus:ring-red-500' : 'bg-green-800' }}">
                    {{ auth()->user()->participates()->where('event', $event->id)->exists() ? 'Je ne participe plus' : 'Je participe' }}
                </x-primary-button>
            </form>
        </div>

        <img src="{{ asset('storage/images/' . $event->image) }}" alt="Image de l'article" class="w-full h-auto rounded-lg mt-4">
        <p class="text-gray-500 mb-4 mt-4">{{ $event->description }}</p>
    </div>
</x-app-layout>
