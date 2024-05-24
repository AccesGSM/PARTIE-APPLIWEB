<?php

include_once 'modele/connexionModele.php';
include_once 'modele/reservationModel.php';
include_once 'menuControleur.php';

$reservations = getReservations();

include_once 'vue/partials/entete.html.php';
include_once 'vue/reservation/index.html.php';