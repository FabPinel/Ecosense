<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'location',
        'image',
        'creator',
    ];

    /**
     * Relation avec le modèle User (créateur de l'événement).
     * Un événement appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'creator');
    }
}
