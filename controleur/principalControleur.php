<?php

function principalControleur($action){
    $lesActions = [];
    $lesActions["defaut"] = "accueilControleur.php";
    $lesActions["reservation"] = "reservationControleur.php";
    $lesActions["verifierReservation"] = "verifierReservationControleur.php";
    $lesActions["crudReservation"] = "crudReservationControleur.php";
    $lesActions["rechercheReservation"] = "rechercheReservationControleur.php";
    $lesActions["supprimerReservation"] = "supprimerReservationControleur.php";
    $lesActions["formMiseAJourReservation"] = "recapReservationControleur.php";
    $lesActions["miseAJourReservation"] = "majReservationControleur.php";
    $lesActions["creerReservation"] = "creerReservationControleur.php";

    if (array_key_exists($action, $lesActions)){
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
