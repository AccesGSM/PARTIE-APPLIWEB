<?php

include_once 'modele/connexionModele.php';
include_once 'modele/reservationModel.php';
include_once 'menuControleur.php';

$reservations = getReservations();

$titre = "Réservations";
include_once 'vue/partials/enteteAdmin.html.php';
include_once 'vue/reservation/index.html.php';