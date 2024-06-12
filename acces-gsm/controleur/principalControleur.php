<?php
/*
session_start();
include_once 'authentificationModel.php';
function principalControleur($action)
{
    $lesActions = [];
    $lesActions["defaut"] = "loginControleur.php";
    $lesActions["connexion"] = "loginControleur.php";
    $lesActions["accueil"] = "accueilControleur.php";
    $lesActions["deconnexion"] = "logoutControleur.php";

    // À bloquer si pas connecté comme administrateur
    $actionsAdmin = [
        "reservation", "usagers", "acces", "verifierReservation",
        "crudReservation", "rechercheReservation", "supprimerReservation",
        "formMiseAJourReservation", "formMiseAJourUsager", "formMiseAJourAcces",
        "miseAJourUsager", "miseAJourReservation", "miseAJourAcces",
        "creerReservation", "creerUsager", "creerAcces", "profil"
    ];

    foreach ($actionsAdmin as $actionAdmin) {
        $lesActions[$actionAdmin] = $actionAdmin."Controleur.php";
        var_dump($lesActions);
    }

    if (array_key_exists($action, $lesActions)) {
        if (in_array($action, $actionsAdmin) && $_SESSION["admin"]==1) {
            return $lesActions[$action]; // Rediriger vers la page de connexion
        }
    }
    return $lesActions["defaut"];
}*/
/*
session_start();
include_once 'authentificationModel.php';

function principalControleur($action)
{
    $lesActions = [
        "defaut" => "loginControleur.php",
        "connexion" => "loginControleur.php",
        "accueil" => "accueilControleur.php",
        "deconnexion" => "logoutControleur.php",
        // Actions admin
        "reservation" => "reservationControleur.php",
        "usagers" => "usagersControleur.php",
        "acces" => "accesControleur.php",
        "verifierReservation" => "verifierReservationControleur.php",
        "crudReservation" => "crudReservationControleur.php",
        "rechercheReservation" => "rechercheReservationControleur.php",
        "supprimerReservation" => "supprimerReservationControleur.php",
        "formMiseAJourReservation" => "recapReservationControleur.php",
        "formMiseAJourUsager" => "recapUsagerControleur.php",
        "formMiseAJourAcces" => "recapAccesControleur.php",
        "miseAJourUsager" => "majUsagerControleur.php",
        "miseAJourReservation" => "majReservationControleur.php",
        "miseAJourAcces" => "majAccesControleur.php",
        "creerReservation" => "creerReservationControleur.php",
        "creerUsager" => "creerUsagerControleur.php",
        "creerAcces" => "creerAccesControleur.php",
        "profil" => "profilControleur.php"
    ];

    // Vérification si l'action est parmi les actions par défaut
    if (array_key_exists($action, $lesActions) && in_array($action, ["defaut", "connexion", "deconnexion"])) {
        return $lesActions[$action];
    }
    // Si ce n'est pas une action par défaut, on vérifie si c'est une action administrative
    elseif (array_key_exists($action, $lesActions) && !in_array($action, ["defaut", "connexion", "deconnexion"])) {
        // Ici, vous pouvez ajouter d'autres vérifications si nécessaire
        return $lesActions[$action];
    }
    // Si l'action n'existe pas du tout, on redirige vers la page par défaut
    else {
        return $lesActions["defaut"];
    }
}

*/

session_start();
include_once 'authentificationModel.php';

function principalControleur($action)
{
    $lesActions = [
        "defaut" => "loginControleur.php",
        "connexion" => "loginControleur.php",
        "accueil" => "accueilControleur.php",
        "deconnexion" => "logoutControleur.php",
        "verifierReservationApi" =>"verifierReservationApi.php",
        // Actions admin
        "reservation" => "reservationControleur.php",
        "usagers" => "usagersControleur.php",
        "acces" => "accesControleur.php",
        "verifierReservation" => "verifierReservationControleur.php",
        "crudReservation" => "crudReservationControleur.php",
        "rechercheReservation" => "rechercheReservationControleur.php",
        "supprimerReservation" => "supprimerReservationControleur.php",
        "formMiseAJourReservation" => "recapReservationControleur.php",
        "formMiseAJourUsager" => "recapUsagerControleur.php",
        "formMiseAJourAcces" => "recapAccesControleur.php",
        "miseAJourUsager" => "majUsagerControleur.php",
        "miseAJourReservation" => "majReservationControleur.php",
        "miseAJourAcces" => "majAccesControleur.php",
        "creerReservation" => "creerReservationControleur.php",
        "creerUsager" => "creerUsagerControleur.php",
        "creerAcces" => "creerAccesControleur.php",
        "profil" => "profilControleur.php"
    ];

    // Vérification si l'action est parmi les actions par défaut
    if (array_key_exists($action, $lesActions) && in_array($action, ["defaut", "connexion", "accueil", "deconnexion"])) {
        return $lesActions[$action];
    }

    // Vérification si l'action est une action admin
    if (array_key_exists($action, $lesActions)) {
        if (strpos($action, "formMiseAJour") !== false || strpos($action, "crud") !== false || strpos($action, "supprimer") !== false ||
            $action === "creerReservation" || $action === "creerUsager" || $action === "creerAcces" ||
            $action === "verifierReservation" || $action === "rechercheReservation" || $action === "profil" ||
            $action === "usagers" || $action === "acces" || $action === "reservation" ||
            $action === "miseAJourUsager" || $action === "miseAJourReservation" || $action === "miseAJourAcces") {

            // Vérifie si l'utilisateur est administrateur
            if (isset($_SESSION["admin"]) && $_SESSION["admin"] == 1) {
                return $lesActions[$action];
            } else {
                // Rediriger vers la page de connexion ou afficher un message d'erreur
                return $lesActions["defaut"];
            }
        } else {
            return $lesActions[$action];
        }
    }

    return $lesActions["defaut"];
}

// Exemple d'utilisation de la fonction avec des paramètres
$action = $_GET['action'] ?? 'defaut'; // Action récupérée de l'URL, 'defaut' si non définie

// Inclusion du contrôleur
//include_once $controleur;
?>
