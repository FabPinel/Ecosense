<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Study;
use App\Models\StudyUser;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class StudyController extends Controller
{
    /**
     * Affiche la liste des études.
     */
    public function index()
    {
        $studies = Study::orderBy('created_at', 'desc')->paginate(10);
        return view('studies', compact('studies'));
    }

    /**
     * Affiche le formulaire de création d'une étude.
     */
    public function create()
    {
        return view('studies.create');
    }

    /**
     * Enregistre une nouvelle étude dans la base de données.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'text' => 'required|string',
            'category' => 'required|string|max:100',
            'image' => 'nullable|mimes:jpeg,jpg,png,svg|max:10240',
            'time' => 'required|integer',
            'video' => 'nullable|string',
        ], [
            'title.required' => 'Le titre est requis',
            'description.required' => 'La description est requise',
            'text.required' => 'Le texte de l\'étude est requis',
            'category.required' => 'Veuillez sélectionner une catégorie',
            'image.mimes' => 'Formats autorisés : jpeg, jpg, png, svg',
            'image.max' => 'La taille de l\'image ne doit pas dépasser 10 Mo',
            'time.required' => 'Le temps estimé est requis',
            'time.integer' => 'Le temps estimé doit être un nombre entier',
            'video' => 'Le lien de la vidéo doit être une URL valide',
        ]);

        $data = $request->only(['title', 'description', 'text', 'time', 'video']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Study::create($data);

        return redirect()->route('studies')->with('success', 'L\'étude a bien été créée');
    }

    /**
     * Récupère une formation par son ID.
     */
    public function getStudyById($id)
    {
        $study = Study::findOrFail($id);
        return view('studies.show', compact('study'));
    }

    public function toggleFollow($studyId)
    {
        $userId = Auth::id();
        
        $follow = StudyUser::where('user', $userId)
            ->where('study', $studyId)
            ->first();

        if ($follow) {
            $follow->delete();

            $user = User::find($userId);
            $user->score -= 50;
            $user->save();

            session()->flash('message', 'Vous ne suivez plus cette formation.');
        } else {
            StudyUser::create(['user' => $userId, 'study' => $studyId]);

            $user = User::find($userId);
            $user->score += 50;
            $user->save();

            session()->flash('message', 'Vous suivez maintenant cette formation.');
        }
        
        return redirect()->route('studies.show', $studyId);
    }

}
