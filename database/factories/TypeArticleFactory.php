<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TypeArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Ce champ doit etre present dans la table en question
            "nom" => array_rand(["Immobilier","Television","Salle","Voiture"], 1)
        ];
    }
}
