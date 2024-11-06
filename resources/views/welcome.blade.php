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
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-white dark:text-black/50">
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
                <div class="w-full">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                            <svg class="h-12 w-auto text-white lg:h-16 lg:text-[#FF2D20]" viewBox="0 0 62 65" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M61.8548 14.6253C61.8778 14.7102 61.8895 14.7978 61.8897 14.8858V28.5615C61.8898 28.737 61.8434 28.9095 61.7554 29.0614C61.6675 29.2132 61.5409 29.3392 61.3887 29.4265L49.9104 36.0351V49.1337C49.9104 49.4902 49.7209 49.8192 49.4118 49.9987L25.4519 63.7916C25.3971 63.8227 25.3372 63.8427 25.2774 63.8639C25.255 63.8714 25.2338 63.8851 25.2101 63.8913C25.0426 63.9354 24.8666 63.9354 24.6991 63.8913C24.6716 63.8838 24.6467 63.8689 24.6205 63.8589C24.5657 63.8389 24.5084 63.8215 24.456 63.7916L0.501061 49.9987C0.348882 49.9113 0.222437 49.7853 0.134469 49.6334C0.0465019 49.4816 0.000120578 49.3092 0 49.1337L0 8.10652C0 8.01678 0.0124642 7.92953 0.0348998 7.84477C0.0423783 7.8161 0.0598282 7.78993 0.0697995 7.76126C0.0884958 7.70891 0.105946 7.65531 0.133367 7.6067C0.152063 7.5743 0.179485 7.54812 0.20192 7.51821C0.230588 7.47832 0.256763 7.43719 0.290416 7.40229C0.319084 7.37362 0.356476 7.35243 0.388883 7.32751C0.425029 7.29759 0.457436 7.26518 0.498568 7.2415L12.4779 0.345059C12.6296 0.257786 12.8015 0.211853 12.9765 0.211853C13.1515 0.211853 13.3234 0.257786 13.475 0.345059L25.4531 7.2415H25.4556C25.4955 7.26643 25.5292 7.29759 25.5653 7.32626C25.5977 7.35119 25.6339 7.37362 25.6625 7.40104C25.6974 7.43719 25.7224 7.47832 25.7523 7.51821C25.7735 7.54812 25.8021 7.5743 25.8196 7.6067C25.8483 7.65656 25.8645 7.70891 25.8844 7.76126C25.8944 7.78993 25.9118 7.8161 25.9193 7.84602C25.9423 7.93096 25.954 8.01853 25.9542 8.10652V33.7317L35.9355 27.9844V14.8846C35.9355 14.7973 35.948 14.7088 35.9704 14.6253C35.9792 14.5954 35.9954 14.5692 36.0053 14.5405C36.0253 14.4882 36.0427 14.4346 36.0702 14.386C36.0888 14.3536 36.1163 14.3274 36.1375 14.2975C36.1674 14.2576 36.1923 14.2165 36.2272 14.1816C36.2559 14.1529 36.292 14.1317 36.3244 14.1068C36.3618 14.0769 36.3942 14.0445 36.4341 14.0208L48.4147 7.12434C48.5663 7.03694 48.7383 6.99094 48.9133 6.99094C49.0883 6.99094 49.2602 7.03694 49.4118 7.12434L61.3899 14.0208C61.4323 14.0457 61.4647 14.0769 61.5021 14.1055C61.5333 14.1305 61.5694 14.1529 61.5981 14.1803C61.633 14.2165 61.6579 14.2576 61.6878 14.2975C61.7103 14.3274 61.7377 14.3536 61.7551 14.386C61.7838 14.4346 61.8 14.4882 61.8199 14.5405C61.8312 14.5692 61.8474 14.5954 61.8548 14.6253ZM59.893 27.9844V16.6121L55.7013 19.0252L49.9104 22.3593V33.7317L59.8942 27.9844H59.893ZM47.9149 48.5566V37.1768L42.2187 40.4299L25.953 49.7133V61.2003L47.9149 48.5566ZM1.99677 9.83281V48.5566L23.9562 61.199V49.7145L12.4841 43.2219L12.4804 43.2194L12.4754 43.2169C12.4368 43.1945 12.4044 43.1621 12.3682 43.1347C12.3371 43.1097 12.3009 43.0898 12.2735 43.0624L12.271 43.0586C12.2386 43.0275 12.2162 42.9888 12.1887 42.9539C12.1638 42.9203 12.1339 42.8916 12.114 42.8567L12.1127 42.853C12.0903 42.8156 12.0766 42.7707 12.0604 42.7283C12.0442 42.6909 12.023 42.656 12.013 42.6161C12.0005 42.5688 11.998 42.5177 11.9931 42.4691C11.9881 42.4317 11.9781 42.3943 11.9781 42.3569V15.5801L6.18848 12.2446L1.99677 9.83281ZM12.9777 2.36177L2.99764 8.10652L12.9752 13.8513L22.9541 8.10527L12.9752 2.36177H12.9777ZM18.1678 38.2138L23.9574 34.8809V9.83281L19.7657 12.2459L13.9749 15.5801V40.6281L18.1678 38.2138ZM48.9133 9.14105L38.9344 14.8858L48.9133 20.6305L58.8909 14.8846L48.9133 9.14105ZM47.9149 22.3593L42.124 19.0252L37.9323 16.6121V27.9844L43.7219 31.3174L47.9149 33.7317V22.3593ZM24.9533 47.987L39.59 39.631L46.9065 35.4555L36.9352 29.7145L25.4544 36.3242L14.9907 42.3482L24.9533 47.987Z" fill="currentColor"/></svg>
                        </div>
                        @if (Route::has('login'))
                            <nav class="-mx-3 flex flex-1 justify-end">
                                @auth
                                    <a
                                        href="{{ url('/dashboard') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Dashboard
                                    </a>
                                @else
                                    <a
                                        href="{{ route('login') }}"
                                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                    >
                                        Log in
                                    </a>

                                    @if (Route::has('register'))
                                        <a
                                            href="{{ route('register') }}"
                                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                                        >
                                            Register
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