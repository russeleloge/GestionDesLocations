<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->char('sexe');
            $table->string('telephone1');
            $table->string('telephone2')->nullable();
            $table->string('pieceIdentite');
            $table->string('numeroPieceIdentite');
            $table->string('email')->unique();
            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            // $table->string('photo');
            // Se souvenir de moi
            // $table->rememberToken();

            //Enregistre la date et l'heure des differentes operations effectuées
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Permet de revenir sur la version anterieure
        Schema::dropIfExists('users');
    }
}
