<?php

include_once "modele/authentificationModel.php";

// recuperation des donnees GET, POST, et SESSION

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage

// traitement si necessaire des donnees recuperees
logout();



// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Login";
include "vue/partials/entete.html.php";
include "vue/login/login.html.php";