@props(['score' => 0, 'role' => 0]) <!-- On définit les propriétés score et role avec des valeurs par défaut -->

@if ($score >= 500 || $role == 1) <!-- Affiche le bouton si le score est suffisant ou si l'utilisateur est admin -->
    <button {{ $attributes->merge(['type' => 'submit', 'class' => 'rounded-full bg-green-600 p-2 text-white shadow-sm hover:bg-green-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-green-600']) }}>
        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
            <path d="M10.75 4.75a.75.75 0 0 0-1.5 0v4.5h-4.5a.75.75 0 0 0 0 1.5h4.5v4.5a.75.75 0 0 0 1.5 0v-4.5h4.5a.75.75 0 0 0 0-1.5h-4.5v-4.5Z" />
        </svg>
    </button>
@endif
