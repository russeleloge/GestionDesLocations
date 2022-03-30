<?php 


function userFullname(){
    return auth()->user()->prenom . " " . auth()->user()->nom;
}
