<?php

// creation du menu de recherche
$menuRecherche = [];
$menuRecherche[] = ["url" => "./?action=rechercheReservation&critere=nom", "label" => "Recherche par nom"];
$menuRecherche[] = ["url" => "./?action=rechercheReservation&critere=telephone", "label" => "Recherche par numéro de téléphone"];
$menuRecherche[] = ["url" => "./?action=rechercheReservation&critere=designation", "label" => "Recherche par accès"];