<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class EventController extends Controller
{
    /**
     * Affiche la liste des événements.
     */
    public function index()
    {
        $events = Event::with('creator')->orderBy('created_at', 'desc')->paginate(10);
        return view('events', compact('events'));
    }    

    /**
     * Affiche le formulaire de création d'un événement.
     */
    public function create()
    {
        return view('events.create');
    }

    /**
     * Enregistre un nouvel événement dans la base de données.
     */
    public function store(Request $request)
    {
        // Validation des champs du formulaire
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'event_date' => 'required|date',
            'image' => 'required|mimes:jpeg,jpg,png,svg|max:10240',
        ], [
            'title.required' => 'Le titre est requis',
            'description.required' => 'La description est requise',
            'location.required' => 'Le lieu est requis',
            'event_date.required' => 'La date de l\'événement est requise',
            'event_date.date' => 'La date de l\'événement doit être une date valide',
            'image.required' => 'Une image est requise',
            'image.mimes' => 'Formats autorisés : jpeg, jpg, png, svg',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 10 Mo',
        ]);
    
        // Récupération des données du formulaire
        $data = $request->only(['title', 'description', 'location', 'event_date']);
        $data['creator'] = Auth::id();
    
        // Gestion de l'upload d'image
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $data['image'] = $imageName;
        }
    
        // Création de l'événement avec `event_date`
        Event::create($data);
    
        // Redirection avec un message de succès
        return redirect()->route('events')->with('success', 'L\'événement a bien été créé');
    }
    
    /**
     * Récupère un événement par son ID.
     */
    public function getEventById($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Récupérer l'utilisateur par son ID.
     */
    public function getUserById($userId)
    {
        return User::select('id', 'name', 'score')->findOrFail($userId);
    }    
}
