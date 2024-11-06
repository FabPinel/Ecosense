<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Article extends Model
{
    use HasFactory;
    use Searchable;

    /**
     * Les attributs assignables.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'description',
        'text',
        'image',
        'creator',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator');
    }
     /**
     * Customize the data that gets sent to Algolia.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();

        // Customize the array as needed, for example:
        return [
            'title' => $array['title'],
            'description' => $array['description'],
            'text' => $array['text'],
            'category' => $array['category'],
            'creator' => $this->user->name ?? null, // Include user name if available
        ];
    }
}
