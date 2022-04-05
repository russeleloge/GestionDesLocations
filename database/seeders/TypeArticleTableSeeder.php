<?php

namespace Database\Seeders;

use App\Models\TypeArticle;
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
        TypeArticle::factory(20)->create();
    }
}
