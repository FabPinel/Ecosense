<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyUser extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user',
        'study',
    ];

    /**
     * Relation avec le modèle User.
     * Une entrée dans `study_users` appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    /**
     * Relation avec le modèle Study.
     * Une entrée dans `study_users` appartient à une étude.
     */
    public function study()
    {
        return $this->belongsTo(Study::class, 'study');
    }
}
