<section><h2 id="collection-heading" class="text-2xl font-bold tracking-tight text-gray-900">Derniers articles</h2> 
                <p class="mt-4 text-base text-gray-500">Explorez l'écologie avec nos articles pour créer des
                    solutions durables à la maison. Faites place à la créativité et à la responsabilité environnementale !
                    🌱🛠️</p>
                <div class="mt-8 text-right">
                    <a href="{{ route('articles') }}" class="inline-flex items-right px-4 py-2 text-sm font-medium rounded-md text-green-500 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        Afficher plus →
                    </a>
                </div>
                
                <div class="mt-5 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                    @foreach ($lastArticles as $article)
                        <a href="{{ route('articles.show', $article->id) }}" class="group block">
                            <div aria-hidden="true"
                                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                <img src="{{ asset('storage/images/' . $article->image) }}"
                                    class="h-52 w-96 object-cover object-center">
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $article->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                {{ Str::limit($article->description, $limit = 160, $end = '...') }}
                            </p>
                            <span class="inline-flex items-center rounded-md bg-gray-50 px-2 py-1 text-xs font-medium text-gray-600 ring-1 ring-inset ring-gray-500/10">{{$article->category}}</span>
                        </a>
                    @endforeach
                </div>
 </section>