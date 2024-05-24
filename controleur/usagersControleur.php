<?php

include_once 'modele/connexionModele.php';
include_once 'modele/usagersModel.php';
include_once 'menuControleur.php';

$usagers = getUsager();

include_once 'vue/partials/entete.html.php';
include_once 'vue/usager/index.html.php';
