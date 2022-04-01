<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Utilisateurs extends Component
{

    // Pour la pagination
    use WithPagination;

    // Pour demander au code d'utiliser bootstrap au lieu de thailwinCSS
    protected $paginationTheme = "bootstrap";
    public $isBtnAddClicked = false;

    // A la fin on aura une collection avec toutes les valeurs, par exemple:
    // ["nom"=>"valeur", ...], au lieu de creer plusieurs variables
    public $newUser = [];

    // Definition des regles avant l'emission du formulaire
    protected $rules = [
        'newUser.nom' => 'required',
        'newUser.prenom' => 'required',
        // C-a-d le champ email est obligatoire et doit etre type 
        // email et unique dans la table users precisement sur la colonne email
        'newUser.email' => 'required|email|unique:users,email',
        // C-a-d le champ telephone1 est obligatoire et doit etre un nombre...
        'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
        'newUser.pieceIdentite' => 'required',
        'newUser.sexe' => 'required',
        'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
    ];

    // messages est une variable systeme
    protected $messages = [
        'newUser.nom.required' => "Le nom de l'utilisateur est requis",
        'newUser.prenom.required' => "Le prenom est requis",
        'newUser.sexe.required' => "Le sexe est requis",
        'newUser.pieceIdentite.required' => "La piece d'identite est requise",
        // 'newUser.numeroPieceIdentite.required' => "Le numero de la piece d'identite est requis",
    ];

    protected $validationAttributes = [
        'newUser.email' => "email",
        'newUser.telephone1' => "telephone",
        'newUser.numeroPieceIdentite' => "numero de la piece d'identite",
    ];

    // Dans cette fonction render() comme nous utilisons le model user, partotut ou
    // nous allons l'appeler il va recharger la page. CRPL, lorsqu'un utilisateur est supprimer,
    // la page est recharger automatiquement
    public function render()
    {
        return view('livewire.utilisateurs.index', [
            // users sera donc utiliser dans les vues
            // "users" => User::all()
            // ca va afficher les utilisateurs en page de 10 par rapport au plus recent
            "users" => User::latest()->paginate(10)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }

    // Ces 2 fonctions seront utiliser dans la vue index pour savoir si on doit
    // afficher le formulaire ou la liste des utilisateurs 
    public function goToAddUser()
    {
        $this->isBtnAddClicked = true;
    }

    public function goToListUser()
    {
        $this->isBtnAddClicked = false;
    }

    public function addUser()
    {
        // dump($this->newUser);
        // Verifier que les informations envoyer par le formulaire sont corrects
        // Elle renvoit un tableau des attributs qui ont ete valider
        $validationAttributes = $this->validate();

        // On attribut au champ password une valeur
        $validationAttributes["newUser"]["password"] = "password";

        // Ajout d'un nouvel utilisateur
        // Avant ca, faut aller dans le model User definir les proprietes
        //  a inserer au prealable(Au niveau de protected $fillable)
        User::create($validationAttributes["newUser"]);

        // On vide le tableau apres l'insertion 
        $this->newUser = [];

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur crée avec succès!"]);
    }


    public function confirmDelete($name, $id)
    {
        // dispatchBrowserEvent permet de renvoyer un evenement
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "message" => [
                    "text" => ["$name va etre supprimer de la liste des utilisateurs."],
                    "title" => "Etes-vous sur de vouloir continuer ?",
                    "type" => "warning",
                    "data" => [
                        "user_id" => $id,
                    ]
                ]
            ]
        );
    }

    public function deleteUser($id){
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur supprimé avec succès!"]);
    }



}
