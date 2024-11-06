<section class="flex justify-center items-center">
    <div class="text-center">
        <h1 class="text-4xl font-bold text-gray-900">{{ Auth::user()->name }}</h1>
        <span class="mt-5 inline-flex items-center rounded-md bg-red-50 px-2 py-1 text-l font-medium text-red-700 ring-1 ring-inset ring-red-600/10">Badge</span>
        <dl class="mt-5 grid grid-cols-1 gap-5 sm:grid-cols-3">
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Classement</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">1er</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Score</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">1300</dd>
            </div>
            <div class="overflow-hidden rounded-lg bg-white px-4 py-5 shadow sm:p-6">
            <dt class="truncate text-sm font-medium text-gray-500">Article suivi</dt>
            <dd class="mt-1 text-3xl font-semibold tracking-tight text-gray-900">10</dd>
            </div>
        </dl>
        </div>
</section>