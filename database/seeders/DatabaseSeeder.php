<?php

namespace Database\Seeders;

// Importation de la classe article
use App\Models\Article;
use App\Models\User;
use App\Models\Client;
use Illuminate\Database\Seeder;
use Prophecy\Call\Call;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Il va executer le fichier de TypeArticleTableSeeder
        $this->Call(TypeArticleTableSeeder::class);

        // permet d'executer la factory(nombre d'articles qu'il va generer)
        Article::factory(10)->create();
        // \App\Models\User::factory(10)->create();
        Client::factory(10)->create();
        User::factory(10)->create();

        $this->call(RoleTableSeeder::class);
        $this->call(StatutLocationTableSeeder::class);
        $this->call(PermissionTableSeeder::class);
        $this->call(DureeLocationTableSeeder::class);
    }
}
