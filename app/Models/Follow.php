<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user',
        'follower',
    ];

    /**
     * Relation avec le modèle User (utilisateur suivi).
     * Un enregistrement dans `follows` appartient à un utilisateur suivi.
     */
    public function followedUser()
    {
        return $this->belongsTo(User::class, 'user');
    }

    /**
     * Relation avec le modèle User (utilisateur qui suit).
     * Un enregistrement dans `follows` appartient à un utilisateur suiveur.
     */
    public function followerUser()
    {
        return $this->belongsTo(User::class, 'follower');
    }
}
