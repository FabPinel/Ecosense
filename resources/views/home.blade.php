<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
                @include ('home.heroSection')
                @include ('home.lastArticles')
                @include ('home.nextEvents')
            </div>
        </div> 
    </div>
</x-app-layout>