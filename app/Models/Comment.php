<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user',
        'article',
        'comment',
    ];

    /**
     * Relation avec le modèle User.
     * Un commentaire appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    /**
     * Relation avec le modèle Article.
     * Un commentaire appartient à un article.
     */
    public function article()
    {
        return $this->belongsTo(Article::class, 'article');
    }
}
