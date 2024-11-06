<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Affiche la liste des articles.
     */
    public function index()
    {
        $articles = Article::orderBy('created_at', 'desc')->paginate(10);
        return view('articles', compact('articles'));
    }

    public function lastArticles()
    {
        $lastArticles = Article::orderBy('created_at', 'desc')->take(3)->get();
        return view('home', compact('lastArticles'));
    }


    /**
     * Affiche le formulaire de création d'un article.
     */
    public function create()
    {
        return view('articles.create');
    }

    /**
     * Enregistre un nouvel article dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'text' => 'required|string',
            'category' => 'required|string|max:100',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:10240',
        ], [
            'title.required' => 'Le titre est requis',
            'description.required' => 'La description est requise',
            'text.required' => 'Le texte de l\'article est requis',
            'category.required' => 'Veuillez sélectionner une catégorie',
            'image.required' => 'Une image est requise',
            'image.mimes' => 'Formats autorisés : jpeg, jpg, png, svg',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 10 Mo',
        ]);

        // Récupération des données du formulaire
        $data = $request->except('image');
        $data['creator'] = Auth::id();

        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $data['image'] = $imageName;
        }

        // Création de l'article
        Article::create($data);

        // Redirection avec un message de succès
        return redirect()->route('articles')->with('success', 'L\'article a bien été créé');
    }

    /**
     * Recuperer un article par son id.
     */
    public function getArticleById($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }
}
