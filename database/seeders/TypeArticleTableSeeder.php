<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeArticleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Interaction directe avec la BD
        DB::table("type_articles")->insert([
            ["nom" => "Voiture"],
            ["nom" => "Immobilier"],
            ["nom" => "Appareils Electroniques"],
            ["nom" => "Salle"]
        ]);
    }
}
