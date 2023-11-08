<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'titre', 
        'contenu', 
        'categorie_id', 
        'date_debut', 
        'date_expiration',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
