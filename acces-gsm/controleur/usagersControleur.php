<?php

include_once 'modele/connexionModele.php';
include_once 'modele/usagersModel.php';
include_once 'menuControleur.php';

$usagers = getUsager();

$titre = "Usagers";
include_once 'vue/partials/enteteAdmin.html.php';
include_once 'vue/usager/index.html.php';
