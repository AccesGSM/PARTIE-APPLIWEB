<?php
include_once 'modele/authentificationModel.php';
include_once 'modele/utilisateurModel.php';

// creation du menu de recherche
$menuRecherche = array();
$menuRecherche[] = Array("url"=>"./?action=profil","label"=>"Consulter mon profil");


// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage 
if (isLoggedOn()){
    $mailU = getMailULoggedOn();
    $util = getUtilisateurByMailU($mailU);

    // traitement si necessaire des donnees recuperees

    $utilAdmin = getAdmin();
    $mailAdmin = $utilAdmin["mailU"];

    if ($mailAdmin == $mailU) {
        $titre = "Mon profil";
        include 'vue/enteteAdmin.html.php';
    }
        else{
            // appel du script de vue qui permet de gerer l'affichage des donnees
            $titre = "Mon profil";
            include "$racine/vue/entete.html.php";
        }
    include "$racine/vue/vueMonProfil.php";
    }
else{
    $titre = "Mon profil";
    include "$racine/vue/entete.html.php";
}