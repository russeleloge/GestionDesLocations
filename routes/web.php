<?php
// importation du modele qu'on veut retourner

use App\Http\Controllers\UserController;
use App\Http\Livewire\TypeArticleComp;
use App\Http\Livewire\Utilisateurs;
use App\Models\Article;
use App\Models\TypeArticle;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Creation d'une nouvelle route
Route::get('/articles', function () {
    // si on veut retourner tous les articles
    // return Article::all();
    return Article::with("type")->paginate(5);
});

Route::get('/types', function () {
    return TypeArticle::with("type")->paginate(5);
});

Auth::routes();

// Notons que le controlleur home necessite une authentification
// c'est le controlleur App\Http\Controllers\HomeController qui est appeler
// Et dasn son onstructeur $this->middleware('auth'); necessite l'authentification
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::group([
    "middleware" => ["auth", "auth.admin"],
    "as" => "admin."
], function () {
    
    Route::group([
        "prefix" => "habilitations",
        "as" => "habilitations."
    ], function () {
        // Utilisateurs fait reference au composant(la classe) qui se trouve a la App\Http\Livewire\Utilisateurs
        Route::get("/utilisateurs", Utilisateurs::class, "index")->name('users.index');
    });


    Route::group([
        "prefix" => "gestarticles",
        "as" => "gestarticles."
    ], function () {
        // TypeArticleComp fait reference au composant(la classe) qui se trouve a la App\Http\Livewire\TypeArticleComp
        Route::get("/typearticles", TypeArticleComp::class)->name('typearticles');
    });
});

// Route::get('/habilitations/utilisateurs', [App\Http\Controllers\UserController::class, 'index'])
// ->name('utilisateurs')
// // La middleware s'execute entre notre code et le controlleur. Elle est utiliser pour securiser les acces
// // auth.admin c'est le nom de la middleware definit dans le kernel
// ->middleware("auth.admin");
