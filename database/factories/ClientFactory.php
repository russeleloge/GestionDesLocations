<?php

namespace Database\Factories;

use App\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{

    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $ville = $this->faker->city;
        $pays = $this->faker->country;
        return [
            // Ces champs doivent correspondrent avec ceux de la bd
            "nom" =>$this->faker->lastName,
            "prenom" =>$this->faker->firstName,
            "sexe" =>array_rand(["F","H"], 1),
            "dateNaissance" => $this->faker->dateTimeBetween("1980-01-01", "2001-12-30"),
            "lieuNaissance" => "$ville, $pays",
            "nationalite" =>$this->faker->country,
            "pays" => $pays,
            "ville" => $ville,
            "adresse" => $this->faker->address,
            "telephone1" => $this->faker->phoneNumber,
            "telephone1" => $this->faker->phoneNumber,
            "pieceIdentite"=> array_rand(["CNI"=>"23", "PASSPORT"=>"22", "PERMIS DE CONDUIRE"=>"54"]),
            "noPieceIdentite" => $this->faker->creditCardNumber,
        ];
    }
}
