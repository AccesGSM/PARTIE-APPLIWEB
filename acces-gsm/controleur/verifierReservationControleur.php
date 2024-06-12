<?php

include_once 'modele/connexionModele.php';
include_once 'modele/verifierReservationModel.php';
include_once 'menuControleur.php';

$telephone = "0672063121";

$verification = verifierReservation($telephone);

include_once 'vue/reservation/verifierReservation.html.php';
