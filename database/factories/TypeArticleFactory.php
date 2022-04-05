<?php

namespace Database\Factories;

use App\Models\TypeArticle;
use Illuminate\Database\Eloquent\Factories\Factory;

class TypeArticleFactory extends Factory
{

    protected $model = TypeArticle::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            // Ce champ doit etre present dans la table en question
            "nom" => $this->faker->city
        ];
    }
}
