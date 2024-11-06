<x-app-layout>
    <div class="w-full mx-auto">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-4">
            @include ('home.heroSection')
            <div class="max-w-7xl flex mx-auto justify-center p-5 mt-10">
                @include ('home.lastArticles')
            </div>
            <div class="max-w-7xl flex mx-auto justify-center p-5 mt-10">
                @include ('home.nextEvents')
            </div>
        </div>
    </div> 
</x-app-layout>