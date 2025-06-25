<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manhwa extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description', 'cover_image'];

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'genre_manhwa');
    }

    public function chapters()
    {
        return $this->hasMany(Chapter::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }
}
