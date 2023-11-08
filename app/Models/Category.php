<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'category_id'];

    public function articles(){
        return $this->hasMany(Article::class);
    }
    

    public function children()
    {
        return $this->hasMany(Category::class);
    }


    public function getAllArticlesRecursive()
    {
        $articles = $this->articles;
        //
        foreach ($this->children as $child) {
            $articles = $articles->merge($child->getAllArticlesRecursive());
        }

        return $articles;
    }
}
