@props(['score'])

@php
    // Déterminer le grade et les styles associés selon le score
    if ($score < 100) {
        $grade = "Graine d'Espoir 🌱";
        $bgColor = "bg-green-50";
        $textColor = "text-green-700";
        $ringColor = "ring-green-600/10";
    } elseif ($score < 300) {
        $grade = "Ami des Abeilles 🌿";
        $bgColor = "bg-yellow-50";
        $textColor = "text-yellow-700";
        $ringColor = "ring-yellow-600/10";
    } elseif ($score < 600) {
        $grade = "Éclaireur des forêts 🐦";
        $bgColor = "bg-blue-50";
        $textColor = "text-blue-700";
        $ringColor = "ring-blue-600/10";
    } elseif ($score < 1000) {
        $grade = "Gardien de la Terre 🌾";
        $bgColor = "bg-orange-50";
        $textColor = "text-orange-700";
        $ringColor = "ring-orange-600/10";
    } else {
        $grade = "Héros de la terre 🌍";
        $bgColor = "bg-purple-50";
        $textColor = "text-purple-700";
        $ringColor = "ring-purple-600/10";
    }
@endphp

<span class="inline-flex items-center rounded-md {{ $bgColor }} px-2 py-1 text-l font-medium {{ $textColor }} ring-1 ring-inset {{ $ringColor }}">
    {{ $grade }}
</span>
