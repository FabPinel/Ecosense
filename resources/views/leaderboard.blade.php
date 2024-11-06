<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Classement par meilleur score :") }}
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between gap-x-6 py-5 bg-[#FFFFFF] rounded-t-lg mt-5 border-2 border-black mb-4">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">RANG</p>
                                <p class="text-lg font-bold text-gray-900">JOUEUR</p>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm text-gray-900">SCORE TOTAL</p>
                            </div>
                        </li>

                        @foreach($users as $index => $user)
                            @php
                                // Assigne une couleur spécifique pour les trois premiers
                                $bgColor = match($index) {
                                    0 => 'bg-[#fef1b5]', // Or pour le 1er
                                    1 => 'bg-[#dbdfe6]', // Argent pour le 2e
                                    2 => 'bg-[#e3cab0]', // Bronze pour le 3e
                                    default => 'bg-white'
                                };
                            @endphp

                            <li class="flex justify-between gap-x-6 py-5 {{ $bgColor }}">
                                <div class="flex min-w-0 gap-x-4">
                                    <p class="text-lg font-bold text-gray-900 p-2">{{ $index + 1 }}</p>
                                    <div class="min-w-0 flex-auto">
                                        <p class="text-sm font-semibold text-gray-900">{{ $user->name }}</p>
                                        <p class="mt-1 text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-x-4 p-2">
                                    <p class="text-sm font-semibold text-gray-900">{{ $user->score }} XP</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
