<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Écosense</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
        @endif
    </head>
    <body class="font-sans antialiased">
        <div class="bg-gray-50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20]">
                <div class="w-full">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                        </div>
                        @if (Route::has('login'))
                            <nav class="mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/accueil') }}"
                                        class="rounded-md px-3 py-2 text-red ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Accueil
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                    >
                                        Se connecter
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                                        >
                                            Inscription
                                        </a>
                                    @endif
                                @endauth
                            </nav>
                        @endif
                    </header>
                    @include ('home.heroSection')
                        <section class="py-12 mt-12 mb-12">
                            <div class="max-w-6xl mx-auto text-center">
                                <h2 class="text-3xl font-semibold text-gray-900">Écosense, qu'est-ce que c'est ?</h2>
                                <div class="mt-8 flex flex-col items-center gap-6 md:flex-row md:justify-center">
                                    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
                                        <div class="flex flex-col items-center text-center">
                                            <div class="w-16 h-16 bg-[#D9EADA] rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 bg-[#D9EADA]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.75 6h14.5M4.75 12h14.5M4.75 18h14.5"/>
                                                </svg>
                                            </div>
                                            <h3 class="mt-4 text-xl font-semibold text-gray-800">Plateforme interactive</h3>
                                            <p class="mt-2 text-gray-600">
                                                Eco Sense sensibilise et éduque sur les gestes écologiques à travers des articles, des événements et des formations ludiques.
                                            </p>
                                            <button class="mt-4 px-4 py-2 bg-[#69AE6B] text-white rounded-md hover:bg-green-600">
                                                En savoir plus
                                            </button>
                                        </div>
                                    </div>

                                    <div class="w-full max-w-md p-6 bg-white rounded-lg shadow-md">
                                        <div class="flex flex-col items-center text-center">
                                            <div class="w-16 h-16 bg-[#D9EADA] rounded-full flex items-center justify-center">
                                                <svg class="w-8 h-8 bg-[#D9EADA]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3M12 19h.01M4 6l1.29 1.29A1 1 0 015 8h14a1 1 0 01.71.29L21 6M5 8v9a1 1 0 001 1h12a1 1 0 001-1V8"/>
                                                </svg>
                                            </div>
                                            <h3 class="mt-4 text-xl font-semibold text-gray-800">Gamification</h3>
                                            <p class="mt-2 text-gray-600">
                                                Gagnez des points et des badges en participant à des défis et en partageant vos connaissances. Rejoignez-nous pour apprendre et agir ensemble !
                                            </p>
                                            <button class="mt-4 px-4 py-2 bg-[#69AE6B] text-white rounded-md hover:bg-green-600">
                                                Rejoindre la communauté
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        <div class="overflow-hidden w-full py-16 bg-[#243E25] bg-opacity-60">
                            <div class="container mx-auto px-6 lg:px-12 max-w-7xl">
                                <div class="grid mx-auto grid-cols-1 gap-y-12 lg:grid-cols-2 lg:gap-x-12">
                                    <div class="flex flex-col justify-center">
                                        <h2 class="text-3xl font-bold text-white sm:text-4xl lg:text-5xl leading-tight">
                                            Rejoignez ÉcoSense pour découvrir un monde d'apprentissage et de défis écologiques!
                                        </h2>
                                        <p class="mt-6 text-lg text-gray-200 leading-relaxed">
                                            En vous connectant, vous aurez accès à :
                                        </p>
                                        <dl class="mt-8 space-y-4 text-base text-gray-300">
                                            <div class="relative pl-8">
                                                <dt class="inline font-semibold text-white">
                                                    <span class="absolute left-0 text-green-400 font-bold">•</span> Des articles exclusifs pour approfondir vos connaissances
                                                </dt>
                                            </div>
                                            <div class="relative pl-8">
                                                <dt class="inline font-semibold text-white">
                                                    <span class="absolute left-0 text-green-400 font-bold">•</span> Des formations interactives pour adopter des gestes durables
                                                </dt>
                                            </div>
                                            <div class="relative pl-8">
                                                <dt class="inline font-semibold text-white">
                                                    <span class="absolute left-0 text-green-400 font-bold">•</span> Un système de points XP pour récompenser vos progrès
                                                </dt>
                                            </div>
                                            <div class="relative pl-8">
                                                <dt class="inline font-semibold text-white">
                                                    <span class="absolute left-0 text-green-400 font-bold">•</span> Un classement pour vous comparer à vos amis et à la communauté
                                                </dt>
                                            </div>
                                            <div class="relative pl-8">
                                                <dt class="inline font-semibold text-white">
                                                    <span class="absolute left-0 text-green-400 font-bold">•</span> Des défis et missions pour gagner encore plus de points !
                                                </dt>
                                            </div>
                                        </dl>
                                    </div>
                                    <div class="flex justify-center">
                                        <img src="https://image.noelshack.com/fichiers/2024/45/3/1730878019-mockups.jpg" 
                                            alt="Product screenshot" 
                                            class="w-full max-w-md rounded-lg object-contain h-auto">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="relative isolate bg-white pb-32 pt-24 sm:pt-32">
                            <div class="absolute inset-x-0 top-1/2 -z-10 -translate-y-1/2 transform-gpu overflow-hidden opacity-30 blur-3xl" aria-hidden="true">
                                <div class="ml-[max(50%,38rem)] aspect-[1313/771] w-[82.0625rem] bg-gradient-to-tr from-[#69AE6B] to-[#D9EADA]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                            </div>
                            <div class="absolute inset-x-0 top-0 -z-10 flex transform-gpu overflow-hidden pt-32 opacity-25 blur-3xl sm:pt-40 xl:justify-end" aria-hidden="true">
                                <div class="ml-[-22rem] aspect-[1313/771] w-[82.0625rem] flex-none origin-top-right rotate-[30deg] bg-gradient-to-tr from-[#69AE6B] to-[#D9EADA] xl:ml-0 xl:mr-[calc(50%-12rem)]" style="clip-path: polygon(74.1% 44.1%, 100% 61.6%, 97.5% 26.9%, 85.5% 0.1%, 80.7% 2%, 72.5% 32.5%, 60.2% 62.4%, 52.4% 68.1%, 47.5% 58.3%, 45.2% 34.5%, 27.5% 76.7%, 0.1% 64.9%, 17.9% 100%, 27.6% 76.8%, 76.1% 97.7%, 74.1% 44.1%)"></div>
                            </div>
                            <div class="mx-auto max-w-7xl px-6 lg:px-8">
                                <div class="mx-auto max-w-2xl text-center">
                                <h2 class="text-base/7 font-semibold text-[#69AE6B]">Témoignages</h2>
                                <p class="mt-2 text-balance text-4xl font-semibold tracking-tight text-gray-900 sm:text-5xl">Ils ont testé ÉcoSense, découvrez leurs avis !</p>
                                </div>
                                <div class="mx-auto mt-16 grid max-w-2xl grid-cols-1 grid-rows-1 gap-8 text-sm/6 text-gray-900 sm:mt-20 sm:grid-cols-2 xl:mx-0 xl:max-w-none xl:grid-flow-col xl:grid-cols-4">
                                <figure class="rounded-2xl bg-white shadow-lg ring-1 ring-gray-900/5 sm:col-span-2 xl:col-start-2 xl:row-end-1">
                                    <blockquote class="p-6 text-lg font-semibold tracking-tight text-gray-900 sm:p-12 sm:text-xl/8">
                                    <p>“Le système de points et les défis me motivent à m’impliquer davantage pour l’environnement. C’est à la fois amusant et éducatif, j'adore !”</p>
                                    </blockquote>
                                    <figcaption class="flex flex-wrap items-center gap-x-4 gap-y-4 border-t border-gray-900/10 px-6 py-4 sm:flex-nowrap">
                                    <img class="h-10 w-10 flex-none rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=1024&h=1024&q=80" alt="">
                                    <div class="flex-auto">
                                        <div class="font-semibold">Brenna Goyette</div>
                                        <div class="text-gray-600">@brennagoyette</div>
                                    </div>
                                    </figcaption>
                                </figure>
                                <div class="space-y-8 xl:contents xl:space-y-0">
                                    <div class="space-y-8 xl:row-span-2">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                        <p>“Un site génial ! Grâce à ÉcoSense, j'ai appris à réduire mon empreinte écologique au quotidien. Les conseils sont pratiques et faciles à suivre.”</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                        <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1494790108377-be9c29b29330?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        <div>
                                            <div class="font-semibold">Leslie Alexander</div>
                                            <div class="text-gray-600">@lesliealexander</div>
                                        </div>
                                        </figcaption>
                                    </figure>

                                    <!-- More testimonials... -->
                                    </div>
                                    <div class="space-y-8 xl:row-start-1">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                        <p>“Les articles sont vraiment bien rédigés et m’aident à mieux comprendre les enjeux écologiques actuels. Bravo pour cette initiative !”</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                        <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1517841905240-472988babdf9?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        <div>
                                            <div class="font-semibold">Lindsay Walton</div>
                                            <div class="text-gray-600">@lindsaywalton</div>
                                        </div>
                                        </figcaption>
                                    </figure>

                                    <!-- More testimonials... -->
                                    </div>
                                </div>
                                <div class="space-y-8 xl:contents xl:space-y-0">
                                    <div class="space-y-8 xl:row-start-1">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                        <p>“ÉcoSense est devenu mon site de référence pour adopter de meilleures habitudes écologiques. Je recommande à tous ceux qui veulent agir pour la planète.”</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                        <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        <div>
                                            <div class="font-semibold">Tom Cook</div>
                                            <div class="text-gray-600">@tomcook</div>
                                        </div>
                                        </figcaption>
                                    </figure>

                                    <!-- More testimonials... -->
                                    </div>
                                    <div class="space-y-8 xl:row-span-2">
                                    <figure class="rounded-2xl bg-white p-6 shadow-lg ring-1 ring-gray-900/5">
                                        <blockquote class="text-gray-900">
                                        <p>“Je n’ai jamais trouvé de site aussi complet pour apprendre sur l’écologie. Les formations sont top et les missions sont vraiment engageantes !”</p>
                                        </blockquote>
                                        <figcaption class="mt-6 flex items-center gap-x-4">
                                        <img class="h-10 w-10 rounded-full bg-gray-50" src="https://images.unsplash.com/photo-1519345182560-3f2917c472ef?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                                        <div>
                                            <div class="font-semibold">Leonard Krasner</div>
                                            <div class="text-gray-600">@leonardkrasner</div>
                                        </div>
                                        </figcaption>
                                    </figure>

                                    <!-- More testimonials... -->
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </main>
                    <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
                    </footer>
                </div>
            </div>
        </div>
    </body>
</html>