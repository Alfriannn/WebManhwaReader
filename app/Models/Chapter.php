<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chapter extends Model
{
    use HasFactory;

    protected $fillable = [
        'manhwa_id',
        'title',
        'chapter_number',
        'pdf_path'
    ];

    public function manhwa()
    {
        return $this->belongsTo(Manhwa::class);
    }

    public function pages()
    {
        return $this->hasMany(Page::class);
    }
}