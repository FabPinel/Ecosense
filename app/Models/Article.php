<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
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
        'text',
        'image',
        'creator',
        'category',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'creator');
    }
}
