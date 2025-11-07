<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * Campi assegnabili in massa
     */
    protected $fillable = [
        'title',
        'description',
        'image_url',
        'genre_id',
    ];

    public function genre(){
        return $this->belongsTo(Genre::class);
    }

    public function consoles(){
        return $this->belongsToMany(Console::class);
    }
}
