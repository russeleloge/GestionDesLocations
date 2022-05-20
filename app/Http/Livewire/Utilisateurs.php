<?php

namespace App\Http\Livewire;

use App\Models\Role;
use App\Models\User;
use Livewire\Component;
use App\Models\Permission;
use Carbon\Carbon;
use Livewire\WithPagination;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class Utilisateurs extends Component
{

    // Pour la pagination
    use WithPagination;

    // Pour demander au code d'utiliser bootstrap au lieu de thailwinCSS
    protected $paginationTheme = "bootstrap";
    // public $isBtnAddClicked = false;

    // On affecte notre constante definit dans le helpers.php
    // Par defaut on lui attribut la page qui affiche la liste des utilisateurs
    public $currentPage = PAGELIST;


    // A la fin on aura une collection avec toutes les valeurs, par exemple:
    // ["nom"=>"valeur", ...], au lieu de creer plusieurs variables
    public $newUser = [];
    public $editUser = [];

    public $rolePermissions = [];

    // Definition des regles avant l'emission du formulaire
    // rules marche sur validate()
    // protected $rules = [
    //     'newUser.nom' => 'required',
    //     'newUser.prenom' => 'required',
    // C-a-d le champ email est obligatoire et doit etre type 
    // email et unique dans la table users precisement sur la colonne email
    // 'newUser.email' => 'required|email|unique:users,email',
    // C-a-d le champ telephone1 est obligatoire et doit etre un nombre...
    // 'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
    // 'newUser.pieceIdentite' => 'required',
    // 'newUser.sexe' => 'required',
    // 'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
    // ];

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

        // Il permet de changer le texte en francais
        Carbon::setLocale("fr");

        return view('livewire.utilisateurs.index', [
            // users sera donc utiliser dans les vues
            // "users" => User::all()
            // ca va afficher les utilisateurs en page de 10 par rapport au plus recent
            "users" => User::latest()->paginate(10)
        ])
            ->extends("layouts.master")
            ->section("contenu");
    }


    public function rules()
    {
        // definition des regles
        if ($this->currentPage == PAGEEDITFORM) {
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                // Ici on ignore la mise a jour(edition) de la colonne email de la table users 
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id'])],
                'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")->ignore($this->editUser['id'])],
                'editUser.pieceIdentite' => 'required',
                'editUser.sexe' => 'required',
                'editUser.numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")->ignore($this->editUser['id'])],
            ];
        } else {
            return [
                'newUser.nom' => 'required',
                'newUser.prenom' => 'required',
                'newUser.email' => 'required|email|unique:users,email',
                'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
                'newUser.pieceIdentite' => 'required',
                'newUser.sexe' => 'required',
                'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
            ];
        }
    }

    // Ces 2 fonctions seront utiliser dans la vue index pour savoir si on doit
    // afficher le formulaire ou la liste des utilisateurs 
    public function goToAddUser()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToListUser()
    {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
        $this->resetErrorBag($this->editUser);
    }

    public function goToEditUser($id)
    {
        // On va l'utiliser pour maintenir les données dans le formulaire d'édition grace a l'id qui est unique
        $this->editUser = User::find($id)->toArray();
        // dump($this->editUser);
        $this->currentPage = PAGEEDITFORM;

        $this->populateRolePermissions();
    }

    public function updateRoleAndPermissions()
    {

        DB::table("user_role")->where("user_id", $this->editUser["id"])->delete();
        DB::table("user_permission")->where("user_id", $this->editUser["id"])->delete();

        foreach ($this->rolePermissions["roles"] as $role) {
            // ici, on attache l'id du role a l'id de l'utilisateur dans la user_role
            if ($role["active"]) {
                User::find($this->editUser["id"])->roles()->attach($role["role_id"]);
            }
        }
        foreach ($this->rolePermissions["permissions"] as $permission) {
            // Pour chq permission, on teste si c'est activer
            if ($permission["active"]) {
                User::find($this->editUser["id"])->permissions()->attach($permission["permission_id"]);
            }
        }
        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Roles et permissions mis à jour avec succès!"]);
    }

    public function populateRolePermissions()
    {
        $this->rolePermissions["roles"] = [];
        $this->rolePermissions["permissions"] = [];

        // 
        $mapForCB = function ($value) {
            return $value["id"];
        };

        // User::find($this->editUser["id"])->roles->toArray() renvoit les elements de la table roles et user_role
        // On recupere tous le(s) id(s) du ou des role(s)
        // editUser est un tableau qui contient tous les elements d'un user precisement
        $roleIds = array_map($mapForCB, User::find($this->editUser["id"])->roles->toArray());

        $permissionIds = array_map($mapForCB, User::find($this->editUser["id"])->permissions->toArray());



        foreach (Role::all() as $role) {
            // On verifie si un id de la table roles se trouve dans le tableau de roles retourner 
            if (in_array($role->id, $roleIds)) {
                // Si oui, on stocke les donners de ce role dans rolePermissions["roles"] et passe la rmq a vrai
                array_push($this->rolePermissions["roles"], ["role_id" => $role->id, "role_nom" => $role->nom, "active" => true]);
            } else {
                // Dans le cas contraire, on stocke les donners dans rolePermissions["roles"] de ce role et passe la rmq a faux
                array_push($this->rolePermissions["roles"], ["role_id" => $role->id, "role_nom" => $role->nom, "active" => false]);
            }
        }
        // dump($this->rolePermissions);
        // dump($roleIds);

        foreach (Permission::all() as $permission) {
            if (in_array($permission->id, $permissionIds)) {
                array_push($this->rolePermissions["permissions"], ["permission_id" => $permission->id, "permission_nom" => $permission->nom, "active" => true]);
            } else {
                array_push($this->rolePermissions["permissions"], ["permission_id" => $permission->id, "permission_nom" => $permission->nom, "active" => false]);
            }
        }

        // dump($this->rolePermissions);
        // La logique pour charger les roles et les permissions

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

    public function updateUser()
    {
        // Verifier que les informations envoyer par le formulaire sont correctes
        // Elle renvoit un tableau des attributs qui ont ete valider
        $validationAttributes = $this->validate();

        // C'est grace a la function goToListUser() qu'on saura l'Id de l'utilisateur a modifier
        User::find($this->editUser["id"])->update($validationAttributes["editUser"]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur mis à jour avec succès!"]);
    }


    public function confirmPwdReset()
    {
        // dispatchBrowserEvent permet de renvoyer un evenement
        $this->dispatchBrowserEvent(
            "showConfirmMessage",
            [
                "message" => [
                    "text" => ["Vous etes sur le point de réinitialiser le mot de passe de cet utilisateur."],
                    "title" => "Etes-vous sur de vouloir continuer ?",
                    "type" => "warning",
                ]
            ]
        );
    }


    public function resetPassword()
    {

        User::find($this->editUser["id"])->update(["password" => Hash::make(DEFAULTPASSWORD)]);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Mot de passe utilisateur réinitialisé avec succès!"]);
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

    public function deleteUser($id)
    {
        User::destroy($id);

        $this->dispatchBrowserEvent("showSuccessMessage", ["message" => "Utilisateur supprimé avec succès!"]);
    }
}
