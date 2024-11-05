<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Participate extends Model
{
    use HasFactory;

    /**
     * Les attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user',
        'event',
    ];

    /**
     * Relation avec le modèle User (participant).
     * Une participation appartient à un utilisateur.
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user');
    }

    /**
     * Relation avec le modèle Event (événement).
     * Une participation est liée à un événement.
     */
    public function event()
    {
        return $this->belongsTo(Event::class, 'event');
    }
}
