<section><h2 id="collection-heading" class="text-2xl font-bold tracking-tight text-gray-900">Prochains Événements</h2>
                <p class="mt-4 text-base text-gray-500">
                    Ne manquez pas nos événements à venir pour échanger, apprendre et agir ensemble en faveur de l'écologie. Rejoignez des ateliers pratiques, des discussions inspirantes, et développez des solutions durables pour un impact positif sur notre planète. 🌍💡
                </p>
                <div class="mt-10 space-y-12 lg:grid lg:grid-cols-3 lg:gap-x-8 lg:space-y-0">
                    @foreach ($nextEvents as $event)
                        <a href="{{ route('events.show', $event->id) }}" class="group block">
                            <div aria-hidden="true"
                                class="aspect-h-2 aspect-w-3 overflow-hidden rounded-lg lg:aspect-h-6 lg:aspect-w-5 group-hover:opacity-75">
                                <img src="{{ asset('storage/images/' . $event->image) }}"
                                    class="h-52 w-96 object-cover object-center">
                            </div>
                            <h3 class="mt-4 text-base font-semibold text-gray-900">{{ $event->title }}</h3>
                            <p class="mt-2 text-sm text-gray-500">
                                {{ Str::limit($event->description, $limit = 160, $end = '...') }}
                            </p>
                        </a>
                    @endforeach
                </div>
 </section>