<?php 

use Illuminate\Support\Str;


function userFullname(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}


// En faite on cherche a rendre actif le menu courant
// Elle sera appeler dans la vue menu.blade.php
function setMenuClass($route, $classe)
{
    // Cette requete va nous renvoyer le nom de la route 
    $routeActuel = request()->route()->getName();
    // On invoque la function contains
    if (contains($routeActuel, $route)) {
        return $classe;
    }
    // sinon
    return "";
}

// On verifie si $contenu se trouve dans $container
function contains($container, $contenu)
{
    return Str::contains($container, $contenu);
}

function setMenuActive($route)
{
    // Cette requete va nous renvoyer le nom de la route 
    $routeActuel = request()->route()->getName();
    // On invoque la function contains
    if ($routeActuel === $route) {
        return "active";
    }
    // sinon
    return "";
}


function getRoleName()
{
    $rolesName = "";
    $i = 0;
    foreach (auth()->user()->roles as $role) {
        $rolesName .= $role->nom;
        // si i est < au nombre de roles -1 (admin.manager par exemple)
        if ($i < sizeof(auth()->user->roles) - 1) {
            $rolesName .= ".";
        }
        $i++;
    }

    return $rolesName;
}