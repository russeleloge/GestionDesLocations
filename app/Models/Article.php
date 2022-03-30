<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // classe dans laquelle ont ete definies des proprietes qui pourront etre reutiliser(Laravel l'a fait automatiquement)
    use HasFactory;

    // Au cas le nom du modele est different de celui de la table en question
    // protected $table = "articles";\

    // Ici on etablit les contraintes(belongsTo veut dire que la table articles depend de la table type_articles)
    public function type()
    {
        // il comprendra que article a une cle etrangere de type_article_id qui provient de la table type_article precisement sur le champ id
        return $this->belongsTo(TypeArticle::class, "type_article_id", "id");
    }

    public function tarifications()
    {
        return $this->hasMany(Tarification::class);
    }

    public function locations()
    {
        // relation plusieurs a plusieurs
        // Location represente la table(model), article_location c'est la table creer par la relation plusieurs a plusieurs
        // article_id veut dire l'id de la table article
        // location_id veut dire l'id de la table location
        return $this->belongsToMany(Location::class, "article_location", "article_id", "location_id");
    }

    public function proprietes()
    {
        return $this->belongsToMany(ProprieteArticle::class, "article_propriete", "article_id", "propriete_article_id");
    }
}
