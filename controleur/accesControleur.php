<?php

include_once 'modele/connexionModele.php';
include_once 'modele/accesModel.php';
include_once 'menuControleur.php';

$acces = getAcces();

include_once 'vue/partials/entete.html.php';
include_once 'vue/acces/index.html.php';