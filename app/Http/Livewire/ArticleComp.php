<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Article;
use App\Models\TypeArticle;
use Livewire\Component;
use Livewire\WithPagination;

class ArticleComp extends Component
{
    use Withpagination;
    protected $paginationTheme = "bootstrap";
    public $search = "";
    public $filtreType="", $filtreEtat="";


    public function render()
    {

        Carbon::setLocale("fr");

        // Recherche dynamique
        $articleQuery = Article::query();
        if ($this->search != "") {
            $articleQuery->Where("nom","LIKE", "%". $this->search ."%")
                         ->orWhere("noSerie","LIKE", "%". $this->search ."%");
        }

        if ($this->filtreType != "") {
            $articleQuery->Where("type_article_id", $this->filtreType);
        }

        if ($this->filtreEtat != "") {
            $articleQuery->Where("estDisponible", $this->filtreEtat);
        }

        // 
        return view('livewire.articles.index', [
            "articles" => $articleQuery->latest()->paginate(5),
            "typearticles"=>TypeArticle::orderBy("nom", "ASC")->get()
        ])
            ->extends("layouts.master")
            // Ici contenu de la master page sera remplacer par le contenu de cette page
            ->section("contenu");
    }

    public function editArticle(Article $article)
    {
    }

    public function confirmDelete(Article $article)
    {
    }
}
