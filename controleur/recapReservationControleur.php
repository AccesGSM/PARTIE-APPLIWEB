<?php
include_once 'modele/connexionModele.php';
include_once 'modele/reservationModel.php';
include_once 'menuControleur.php';

$id= $_GET['id'];
$majReservation = getReservationById($id);

// appel du script de vue qui permet de gerer l'affichage des donnees
$titre = "Mise à jour utilisateur";
include "vue/partials/entete.html.php";
include "vue/reservation/miseAJourReservation.html.php";