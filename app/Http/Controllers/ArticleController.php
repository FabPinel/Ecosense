<?php 

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Comment;
use App\Services\GeminiService;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    protected $geminiService;

    public function __construct(GeminiService $geminiService)
    {
        $this->geminiService = $geminiService;
    }

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
        ]);

        $data = $request->except('image');
        $data['creator'] = Auth::id();

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('images', $imageName, 'public');
            $data['image'] = $imageName;
        }

        Article::create($data);

        return redirect()->route('articles')->with('success', 'L\'article a bien été créé');
    }

    /**
     * Récupère un article par son ID et génère une question de réflexion.
     */
    public function getArticleById($id)
    {
        $article = Article::with(['user', 'comments.user'])->findOrFail($id);
        
        // Utiliser GeminiService pour générer une question basée sur le contenu de l'article
        $generatedData = $this->geminiService->generateQuestionWithOptions($article->text);

        return view('articles.show', compact('article', 'generatedData'));
    }

    /**
     * Enregistre un commentaire pour un article.
     */
    public function storeComment(Request $request, $articleId)
    {
        $userId = Auth::id();
        
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $article = Article::findOrFail($articleId);

        $comment = new Comment();
        $comment->comment = $request->input('comment');
        $comment->article = $article->id;
        $comment->user = Auth::user()->name;

        $user = Auth::user();
        $user->score += 10;
        $user->save();
        
        $comment->save();

        return redirect()->route('articles.show', $article->id)->with('success', 'Commentaire ajouté avec succès');
    }

    /**
     * Ajout de points si bonne réponse dans l'article.
     */
    public function updateScore(Request $request)
    {
        $user = Auth::user();
        if (!$user) {
            return response()->json(['error' => 'Utilisateur non authentifié'], 401);
        }

        $correctAnswer = $request->input('correctAnswer');
        $userAnswer = $request->input('userAnswer');

        if ($correctAnswer === $userAnswer) {
            $user->score += 25;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Bonne réponse! 50 points ajoutés.']);
        }

        return response()->json(['success' => false, 'message' => 'Mauvaise réponse.']);
    }
}
