<?php

function principalControleur($action){
    $lesActions = [];
    $lesActions["defaut"] = "accueilControleur.php";
    $lesActions["reservation"] = "reservationControleur.php";
    $lesActions["usagers"] = "usagersControleur.php";
    $lesActions["acces"] = "accesControleur.php";
    $lesActions["verifierReservation"] = "verifierReservationControleur.php";
    $lesActions["crudReservation"] = "crudReservationControleur.php";
    $lesActions["rechercheReservation"] = "rechercheReservationControleur.php";
    $lesActions["supprimerReservation"] = "supprimerReservationControleur.php";
    $lesActions["formMiseAJourReservation"] = "recapReservationControleur.php";
    $lesActions["formMiseAJourUsager"] = "recapUsagerControleur.php";
    $lesActions["formMiseAJourAcces"] = "recapAccesControleur.php";
    $lesActions["miseAJourUsager"] = "majUsagerControleur.php";
    $lesActions["miseAJourReservation"] = "majReservationControleur.php";
    $lesActions["miseAJourAcces"] = "majAccesControleur.php";
    $lesActions["creerReservation"] = "creerReservationControleur.php";
    $lesActions["creerUsager"]="creerUsagerControleur.php";
    $lesActions["creerAcces"]="creerAccesControleur.php";
    $lesActions["profil"] = "profilControleur.php";
    $lesActions["connexion"] = "loginControleur.php";
    $lesActions["deconnexion"] = "logoutControleur.php";

    if (array_key_exists($action, $lesActions)){
        return $lesActions[$action];
    } else {
        return $lesActions["defaut"];
    }
}
