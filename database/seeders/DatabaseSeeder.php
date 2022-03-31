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

        // Recuperation des utilisateurs par les id
        // On recupere l'utilisateur qui a l'id numero 1 puis on lui associe le role numero 1 (attach)
        User::find(1)->roles()->attach(1);
        // On peut encore faire differemment en ecrivant
        // $user = User::find(1);
        // $role = Role::find(1);
        // DB::table("user_role")->insert([
        //     "user_id"=>$user->id,
        //     "role_id"=>$role->id
        // ]);
        User::find(2)->roles()->attach(2);
        User::find(3)->roles()->attach(3);
        User::find(4)->roles()->attach(4);
    }
}
