<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProprieteArticle extends Model
{
    use HasFactory;
// Ca permet de limiter les champs qu'on doit recuperer dans l'insertion
    protected $fillable = ["nom","estObligatoire","type_article_id"];
// Pour empecher de renvoyer l'erreur disant que updated_at et created_at n'existe pas
    public $timestamps = false;
    public function type(){
        return $this->belongsTo(TypeArticle::class,"type_article_id","id");
    }

    public function articles(){
        return $this->belongsToMany(Article::class, "article_propriete","propriete_article_id","article_id");
    }

    
}
