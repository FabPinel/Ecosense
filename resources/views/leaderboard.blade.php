<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("Classement par meilleur score :") }}
                    <ul role="list" class="divide-y divide-gray-100">
                    <li class="flex justify-between gap-x-6 py-5 bg-[#FFFFFF] rounded-t-lg mt-5 border-2 border-black">
                        <div class="flex min-w-0 gap-x-4">
                            <p class="text-lg font-bold text-gray-900">RANG</p>
                            <p class="text-lg font-bold text-gray-900">JOUEUR</p>
                            <div class="min-w-0 flex-auto">
                            </div>
                        </div>
                        <div class="flex items-center gap-x-4">
                            <p class="text-sm text-gray-900">SCORE TOTAL</p>
                        </div>
                    </li>

                        <!-- Première ligne (rang 1) -->
                        <li class="flex justify-between gap-x-6 py-5 bg-[#fef1b5] rounded-t-lg mt-9">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">1</p>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold text-gray-900">LOVERLS_PLAYER</p>
                                    <p class="mt-1 text-xs text-gray-500">Skale Enjoyoor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm font-semibold text-gray-900">1,249 GUMP</p>
                            </div>
                        </li>
                        

                        <!-- Deuxième ligne (rang 2) -->
                        <li class="flex justify-between gap-x-6 py-5 bg-[#dbdfe6]">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">2</p>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold text-gray-900">LOVERLS_PLAYER</p>
                                    <p class="mt-1 text-xs text-gray-500">Skale Enjoyoor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm font-semibold text-gray-900">1,249 GUMP</p>
                            </div>
                        </li>

                        <!-- Troisième ligne (rang 3) -->
                        <li class="flex justify-between gap-x-6 py-5 bg-[#e3cab0]">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">3</p>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold text-gray-900">LOVERLS_PLAYER</p>
                                    <p class="mt-1 text-xs text-gray-500">Skale Enjoyoor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm font-semibold text-gray-900">1,249 GUMP</p>
                            </div>
                        </li>

                        <!-- Quatrième ligne (rang 4) -->
                        <li class="flex justify-between gap-x-6 py-5 bg-white">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">4</p>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold text-gray-900">LOVERLS_PLAYER</p>
                                    <p class="mt-1 text-xs text-gray-500">Skale Enjoyoor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm font-semibold text-gray-900">1,249 GUMP</p>
                            </div>
                        </li>

                        <!-- Cinquième ligne (rang 5) -->
                        <li class="flex justify-between gap-x-6 py-5 bg-white">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">5</p>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold text-gray-900">LOVERLS_PLAYER</p>
                                    <p class="mt-1 text-xs text-gray-500">Skale Enjoyoor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm font-semibold text-gray-900">1,249 GUMP</p>
                            </div>
                        </li>

                        <!-- Sixième ligne (rang 6) -->
                        <li class="flex justify-between gap-x-6 py-5 bg-white">
                            <div class="flex min-w-0 gap-x-4">
                                <p class="text-lg font-bold text-gray-900">6</p>
                                <div class="min-w-0 flex-auto">
                                    <p class="text-sm font-semibold text-gray-900">LOVERLS_PLAYER</p>
                                    <p class="mt-1 text-xs text-gray-500">Skale Enjoyoor</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-x-4">
                                <p class="text-sm font-semibold text-gray-900">1,249 GUMP</p>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
