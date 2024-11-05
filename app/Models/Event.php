<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'location',
        'event_date',
        'image',
        'creator',
    ];

    /**
     * Relation avec le modèle User pour obtenir les informations du créateur.
     */
    public function creator()
    {
        return $this->belongsTo(User::class, 'creator');
    }

    // Accessor pour formater la date
    public function getFormattedEventDateAttribute()
    {
        Carbon::setLocale('fr');
        return Carbon::parse($this->event_date)->translatedFormat('j F Y');
    }
}
