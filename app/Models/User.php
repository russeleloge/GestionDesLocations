<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function paiements(){
        return $this->hasMany(Paiement::class);
    }

    public function roles(){
        return $this->belongsToMany(Role::class,"user_role","user_id","role_id");
    }

    public function permissions(){
        return $this->belongsToMany(Permission::class,"user_permission","user_id","permission_id");
    }


    // On verifie si l'utilisateur a un name qui correspond a $role
    // Et s'il trouve il prendra le premier et si ce premier 
    public function hasRole($role){
        return $this->roles()->where("nom", $role)->first() !== null;
    }

    // On verifie si l'utilisateur a un name qui correspond a au moins un element de $roles
    public function hasAnyRoles($roles){
        return $this->roles()->whereIn("nom", $roles)->first() !== null;
    }

//Pour creer des proprietes qui n'existent pas dans la bd mais qu'on aura besoin
// on creer une fonction qui commence par get et se termine par Attribute
// le nom commence par une miniscule et chaque nouveau mot qui suit commence par une lettre miniscule 
// Cette fonction sera invoquer sous le nom de allRoleNames ou all_role_names
    public function getAllRoleNamesAttribute(){
        // {{-- implode permet de separer chaque role(nom) par | si l'utilisateur en a plusieurs --}}
        return $this->roles->implode("nom", ' | ');
    }


}
