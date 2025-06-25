<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function manhwas()
    {
        return $this->belongsToMany(Manhwa::class, 'genre_manhwa');
    }
}
