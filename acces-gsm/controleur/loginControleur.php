<?php

session_start();
include_once 'modele/authentificationModel.php';
include_once 'menuControleur.php';

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mail"]) || !isset($_POST["mdp"])){
    // on affiche le formulaire de connexion
    $titre = "Login";
    include_once 'vue/partials/entete.html.php';
    include "vue/login/login.html.php";
}
else
{
    $mail=$_POST["mail"];
    $mdp=$_POST["mdp"];
    $util = getAdmin();
    $mailAdmin = $util["mail"];

    login($mail,$mdp);

    if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
        if ($mail == $mailAdmin) { // si l'utilisateur est admin on affiche la nav bar admin

            $titre = "Accueil - Accès GSM";
            include "vue/partials/enteteAdmin.html.php";
        }
        include "vue/accueil.html.php";
    }
    else{
        // l'utilisateur n'est pasS connecté, on affiche le formulaire de connexion
        $titre = "Login";
        include "vue/partials/entete.html.php";
        include "vue/login/login.html.php";
    }
}
