<section><h2 id="collection-heading" class="mt-10 text-2xl font-bold tracking-tight text-gray-900">Prochains Événements</h2>
                <p class="mt-4 text-base text-gray-500">
                    Ne manquez pas nos événements à venir pour échanger, apprendre et agir ensemble en faveur de l'écologie. Rejoignez des ateliers pratiques, des discussions inspirantes, et développez des solutions durables pour un impact positif sur notre planète. 🌍💡
                </p>
                <div class="mt-8 text-right">
                    <a href="{{ route('events') }}" class="inline-flex items-right px-4 py-2 text-sm font-medium rounded-md text-green-500 bg-white hover:bg-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        Afficher plus →
                    </a>
                </div>
                <div class="mt-5 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0 mb-10">
                    @foreach ($nextEvents as $event)
                        <a href="{{ route('events.show', $event->id) }}" class="group block transition shadow-md transform hover:translate-y-1 hover:shadow-lg">
                            <div aria-hidden="true"
                                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                <img src="{{ asset('storage/images/' . $event->image) }}"
                                    class="h-52 w-96 object-cover object-center">
                            </div>
                            <div class="flex items-center gap-x-4">
                                <time datetime="{{ $event->event_date }}" class="text-green-500">{{ $event->formatted_event_date }}</time>
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $event->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                {{ Str::limit($event->description, $limit = 160, $end = '...') }}
                            </p>
                        </a>
                    @endforeach
                </div>
 </section>