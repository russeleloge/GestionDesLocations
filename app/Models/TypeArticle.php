<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeArticle extends Model
{
    use HasFactory;

    // type_articles c'est le nom de la table
    protected $table = "type_articles";

    public function articles()
    {
        // cela signifie qu'on peut recuperer tous les articles pour un type d'article
        // hasMany pour dire que la cle primaire de la table type_articles migre dans la table articles
        return $this->hasMany(Article::class);
    }

    // public function proprieteArticles(){
    //     return $this->hasMany(proprieteArticle::class);
    // }
}
