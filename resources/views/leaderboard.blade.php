<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Classement par meilleur score :") }}
                    <ul role="list" class="divide-y divide-gray-100">
                        <li class="flex justify-between gap-x-6 py-5 bg-[#FFFFFF] rounded-t-lg mt-5 border-2 border-black mb-4">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg text-gray-900">RANG</p>
                                <p class="text-lg text-gray-900">JOUEUR</p>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm text-gray-900">GRADE</p>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm text-gray-900">SCORE</p>
                            </div>
                        </li>

                        @foreach($users as $index => $user)
                            @php
                                $bgColor = match($index) {
                                    0 => 'bg-[#fef1b5]',
                                    1 => 'bg-[#dbdfe6]',
                                    2 => 'bg-[#e3cab0]',
                                    default => 'bg-white'
                                };
                            @endphp

                            <li class="flex justify-between gap-x-6 py-5 {{ $bgColor }}">
                                <div class="flex min-w-0 gap-x-4">
                                    <p class="text-lg font-bold text-gray-900 p-2">{{ $index + 1 }}</p>
                                    <div class="min-w-0 flex-auto mt-2">
                                        <a href="{{ route('profile.show', $user->id) }}" class="text-sm font-semibold text-gray-900 hover:text-green-500 transition-colors duration-300 ease-in-out hover:scale-105">
                                            {{ $user->name }}
                                        </a>                                        
                                    </div>
                                </div>
                                <div class="flex items-center gap-x-4 p-2">
                                    <x-grade-badge class="ml-4" :score="$user->score" />
                                </div>
                                <div class="flex items-center gap-x-4 p-2">
                                    <p class="text-sm font-semibold text-gray-900">{{ $user->score }}</p>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
