<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\TypeArticle;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;

class TypeArticleComp extends Component
{
    use WithPagination;

    public $search = "";
    public $isAddTypeArticle = false;
    public $newTypeArticleName = "";
    public $newValue = "";

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

    public function addNewTypeArticle()
    {
        $validated = $this->validate([
            "newTypeArticleName" => "required|max:50|unique:type_articles,nom"
        ]);

        // Le type d'article n'est creer que si les conditions de validation sont respectées
        TypeArticle::create(["nom" => $validated["newTypeArticleName"]]);
        $this->toggleShowAddTypeArticleForm();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article ajouté avec succès !"]);
    }

    // $typeArticle sera considerer par defaut dans le code comme identifiant de cette table
    public function editTypeArticle(TypeArticle $typeArticle)
    {

        // $typeArticle = TypeArticle::find($id);

        $this->dispatchBrowserEvent("showEditForm", ["typearticle" => $typeArticle]);
    }

    public function updateTypeArticle($id, $valueFromJS)
    {
        $this->newValue = $valueFromJS;
        $validated = $this->validate([
            "newValue" => ["required", "max:50", Rule::unique("type_articles", "nom")->ignore($id)]
        ]);

        TypeArticle::find($id)->update(["nom" => $validated["newValue"]]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article mis à jour avec succès !"]);
    }

    public function confirmDelete($name, $id)
    {
        // dispatchBrowserEvent permet de renvoyer un evenement
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "message" => [
                    "text" => ["$name va etre supprimer de la liste des types d'articles."],
                    "title" => "Etes-vous sur de vouloir continuer ?",
                    "type" => "warning",
                    "data" => [
                        "type_article_id" => $id,
                    ]
                ]
            ]
        );
    }

    public function deleteTypeArticle(TypeArticle $typeArticle)
    {
        $typeArticle->delete();
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Type d'article supprimé avec succès !"]);
    }
}
