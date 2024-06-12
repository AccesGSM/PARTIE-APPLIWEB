<?php
include_once 'modele/connexionModele.php';
include_once 'modele/reservationModel.php';
include_once 'menuControleur.php';

$id= $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$designation = $_POST['designation'];
$date_debut = $_POST['date_debut'];
$date_fin = $_POST['date_fin'];
$heure = $_POST['heure'];
$duree = $_POST['duree'];
$cycle = $_POST['cycle'];
$resultat = majReservation($id, $date_debut, $date_fin, $heure, $duree, $cycle, $nom, $prenom, $telephone, $designation);
if ($resultat) {
    // Redirection vers la page de réservations après l'ajout
    header('Location: ./?action=reservation');
    exit();
} else {
    // En cas d'erreur, afficher un message d'erreur
    $erreur_message = "Une erreur s'est produite lors de la modification de la réservation.";
}

$titre = "Mise à jour utilisateur";
include_once 'vue/partials/enteteAdmin.html.php';
include_once 'vue/reservation/miseAJourReservation.html.php';
header('Location: ./?action=reservation');