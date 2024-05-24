<?php
if ( $_SERVER["SCRIPT_FILENAME"] == __FILE__ ){
    $racine="..";
}
include_once "$racine/modele/authentificationModel.php";

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=connexion","label"=>"Connexion");

// recuperation des donnees GET, POST, et SESSION
if (!isset($_POST["mailU"]) || !isset($_POST["mdpU"])){
    // on affiche le formulaire de connexion
    $titre = "authentification";
    include "$racine/vue/entete.html.php";
    include "$racine/vue/authentification.html.php";
}
else
{
    $mailU=$_POST["mailU"];
    $mdpU=$_POST["mdpU"];
    $util = getAdmin();
    $mailAdmin = $util["mailU"];

    login($mailU,$mdpU);

    if (isLoggedOn()){ // si l'utilisateur est connecté on redirige vers le controleur monProfil
        if ($mailU == $mailAdmin) { // si l'utilisateur est admin on affiche la nav bar admin
            include "$racine/vue/entete.html.php";
            include "$racine/vue/accueil.html.php";
        }else{
            include "$racine/vue/accueil.html.php";
        }
    }
    else{
        // l'utilisateur n'est pasS connecté, on affiche le formulaire de connexion
        $titre = "authentification";
        include "$racine/vue/entete.html.php";
        include "$racine/vue/authentification.html.php";
    }
}
