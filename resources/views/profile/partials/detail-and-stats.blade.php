<section class="flex justify-center items-center">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900">{{ $user->name }}</h1>
        <x-grade-badge :score="$user->score" />

        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Classement</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $rank }}ᵉ</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Score</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $user->score }}</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
                <dt class="truncate text-sm font-medium text-gray-500">Participation</dt>
                <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">{{ $participationCount }}</dd>
            </div>
        </dl>
    </div>
</section>
