<?php

namespace Database\Factories;

use App\Models\Article;
// Eloquent est un pont entre notre code et la bd
use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{

    // Pour mettre en relation le factory et le modele
    // @var string
    protected $model = Article::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Ce sont les champs qui vont etre generer lorsqu'on cree un article
            // faker permet de generer les donnees
            "nom" => $this->faker->lastName,
            "noSerie" => $this->faker->swiftBicNumber,
            "imageUrl" => $this->faker->imageUrl(),
            "type_article_id" => rand(1,4),
            "estDisponible" => rand(0,1)
        ];
    }
}
