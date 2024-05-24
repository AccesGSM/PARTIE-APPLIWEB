<?php

include "controleur/principalControleur.php";

$action = isset($_GET['action']) ? $_GET['action'] : 'defaut';

// shunter le routeur si la requête GET concerne l'API
if (strpos($_SERVER['REQUEST_URI'], '/api/') !== false) {
    include "api/verifierReservationApi.php";
    exit();
}

$controleur = principalControleur($action);

include "controleur/$controleur";

