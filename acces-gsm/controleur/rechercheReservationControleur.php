<?php

include_once "modele/reservationModel.php";
include_once 'menuControleur.php';

// critere de recherche par defaut
/*$critere = "nom";
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}*/

// recuperation des donnees GET, POST, et SESSION
if (isset($_GET["critere"])) {
    $critere = $_GET["critere"];
}
$nom = "";
if (isset($_POST["nom"])) {
    $nom = $_POST["nom"];
}
$telephone = "";
if (isset($_POST["telephone"])) {
    $telephone = $_POST["telephone"];
}
$designation = "";
if (isset($_POST["designation"])) {
    $designation = $_POST["designation"];
}

// appel des fonctions permettant de recuperer les donnees utiles a l'affichage

switch ($critere) {
    case 'nom':
        $reservations = getReservationsByNom($nom);
        break;
    case 'telephone':
        $reservations = getReservationsByTelephone($telephone);
        break;
    case 'designation':
        $reservations = getReservationsByDesignation($designation);
        break;
}
$titre = "Recherche d'une réservation";
include "vue/partials/enteteAdmin.html.php";
include "vue/reservation/rechercheReservation.html.php";
if (!empty($_POST)) {
    // affichage des resultats de la recherche
    include "vue/reservation/resultatRechercheReservation.html.php";
}