<?php
include_once 'modele/connexionModele.php';
include_once 'modele/accesModel.php';
include_once 'menuControleur.php';

// Vérification et récupération des variables POST
$id = isset($_POST['id']) ? $_POST['id'] : null;
$designation = isset($_POST['designation']) ? $_POST['designation'] : null;
$telephone = isset($_POST['telephone']) ? $_POST['telephone'] : null;
$port1 = isset($_POST['port1']) ? $_POST['port1'] : null;
$nom1 = isset($_POST['nom1']) ? $_POST['nom1'] : null;
$port2 = isset($_POST['port2']) ? $_POST['port2'] : null;
$nom2 = isset($_POST['nom2']) ? $_POST['nom2'] : null;

// S'assurer que toutes les variables nécessaires sont présentes
if ($id !== null && $designation !== null && $telephone !== null && $port1 !== null && $nom1 !== null && $port2 !== null && $nom2 !== null) {
    $resultat = majAcces($id, $designation, $telephone, $port1, $nom1, $port2, $nom2);
    if ($resultat) {
        // Redirection vers la page de réservations après la mise à jour
        header('Location: ./?action=acces');
        exit();
    } else {
        // En cas d'erreur de mise à jour
        $erreur_message = "Une erreur s'est produite lors de la modification de l'accès.";
    }
} else {
    // En cas de variables manquantes
    $erreur_message = "Toutes les données de formulaire nécessaires n'ont pas été soumises.";
}

// Affichage de la vue en cas d'erreur
$titre = "Mise à jour accès";
include_once 'vue/partials/enteteAdmin.html.php';
include_once 'vue/acces/miseAJourAcces.html.php'; // Assurez-vous que ce fichier existe et affiche $erreur_message
?>