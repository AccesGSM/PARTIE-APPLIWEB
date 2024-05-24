<?php

include_once 'modele/connexionModele.php';
include_once 'modele/reservationModel.php';
include_once 'menuControleur.php';

$id= $_GET["id"];

delReservation($id);

$titre = "Suppession utilisateur";
header('Location: ' . $_SERVER['HTTP_REFERER']);
include_once 'vue/partials/entete.html.php';
include_once 'vue/reservation/index.html.php';
