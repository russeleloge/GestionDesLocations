<?php

namespace App\Http\Livewire;

use App\Models\TypeArticle;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class TypeArticleComp extends Component
{
    use WithPagination;

    public $search = "";
    public $isAddTypeArticle = false;
    public $newTypeArticleName = "";

    protected $paginationTheme = "bootstrap";

    public function render()
    {

        Carbon::setLocale("fr");
        
        $searchCriteria = "%" . $this->search . "%";
        $data = [
            "typearticles" => TypeArticle::where("nom", "like", $searchCriteria)->latest()->paginate(5),
        ];

        // On passe $data en parametre pour pouvoir faire la recherche par rapport à lui
        return view('livewire.typearticles.index', $data)
            ->extends("layouts.master")
            // Ici contenu de la master page sera remplacer par le contenu de cette page
            ->section("contenu");
    }


    public function toggleShowAddTypeArticleForm()
    {
        if ($this->isAddTypeArticle) {
            $this->isAddTypeArticle = false;
            // On efface le contenu de l'input pour ne pas le retrouver lorsqu'on reviendra sur lui
            $this->newTypeArticleName = "";
            // On efface l'erreur
            $this->resetErrorBag(["newTypeArticleName"]);
        } else {
            $this->isAddTypeArticle = true;
        }
    }

    public function addNewTypeArticle(){
        $validated = $this->validate([
            "newTypeArticleName" => "required|max:50|unique:type_articles,nom"
        ]);

        // Le type d'article n'est creer que si les conditions de validation sont respectées
        TypeArticle::create(["nom"=>$validated["newTypeArticleName"]]);
        $this->toggleShowAddTypeArticleForm();
    }

}
