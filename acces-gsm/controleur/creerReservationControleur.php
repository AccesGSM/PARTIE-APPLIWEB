<?php
include_once 'modele/connexionModele.php';
include_once 'modele/reservationModel.php';
include_once 'menuControleur.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des données du formulaire
    $usager_id = $_POST['usager'];
    $designation = $_POST['designation'];
    $date_debut = $_POST['date_debut'];
    $heure_debut = $_POST['heure_debut'];
    $duree = $_POST['duree'];
    $cycle = $_POST['cycle'];

    // Appel de la fonction pour ajouter une réservation
    $resultat = creerReservation($usager_id, $designation, $date_debut, $heure_debut, $duree, $cycle);

    if ($resultat) {
        // Redirection vers la page de réservations après l'ajout
        header('Location: ./?action=reservation');
        exit();
    } else {
        // En cas d'erreur, afficher un message d'erreur
        $erreur_message = "Une erreur s'est produite lors de l'ajout de la réservation.";
    }
}
// Pour récupérer la liste des désignations des accès et des usagers
$descriptions = getAccessDesignations();
$usagers = getUsagers();

$titre = "Créer une réservation";
include_once 'vue/partials/enteteAdmin.html.php';
include_once 'vue/reservation/creerReservation.html.php';
