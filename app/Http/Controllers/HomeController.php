<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Event;

class HomeController extends Controller
{
    public function accueil()
    {
        // Récupère les trois derniers articles
        $lastArticles = Article::orderBy('created_at', 'desc')->take(3)->get();

        // Récupère les trois prochains événements
        $nextEvents = Event::withCount('participants')
                    ->where('event_date', '>=', now())
                    ->orderBy('event_date', 'asc')
                    ->take(3)
                    ->get();

        return view('home', compact('lastArticles', 'nextEvents'));
    }
}
