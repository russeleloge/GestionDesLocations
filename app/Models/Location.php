<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    // ON peut connaitre le client qui a effectuer le paiement
    public function client(){
        return $this->belongsTo(Client::class);
    }

    public function statut(){
        // statut_location_id doit etre ecrit de la meme maniere que dans la migration create_location_table
        return $this->belongsTo(StatutLocation::class, "statut_location_id","id");
    }

    // une location peut avoir plusieurs paiements
    // pour une location, on peut recuperer tous les paiements
    public function paiements(){
        return $this->hasMany(paiements::class);
    }

    public function articles(){
        // relation plusieurs a plusieurs
                // Article represente la table(model), article_location c'est la table creer par la relation plusieurs a plusieurs
                // location_id veut dire l'id de la table location
                // article_id veut dire l'id de la table article
                return $this->belongsToMany(Article::class,"article_location","location_id","article_id");
            }
}
