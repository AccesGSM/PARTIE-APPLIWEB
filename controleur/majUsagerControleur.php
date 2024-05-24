<?php
include_once 'modele/connexionModele.php';
include_once 'modele/usagersModel.php';
include_once 'menuControleur.php';

// Récupérer les données du formulaire
$id = $_POST['id'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];

// Vérifier si autorise est défini dans $_POST, sinon donner une valeur par défaut de 0
$autorise = isset($_POST['autorise']) ? 1 : 0;

// Mise à jour de l'usager dans la base de données
$resultat = majUsager($id, $email, $nom, $prenom, $telephone, $autorise);

if ($resultat) {
    // Redirection vers la page de liste des usagers après la mise à jour
    header('Location: ./?action=usagers');
    exit();
} else {
    // En cas d'erreur, afficher un message d'erreur
    $erreur_message = "Une erreur s'est produite lors de la mise à jour de l'usager.";
}

// Afficher le formulaire de mise à jour avec les informations actuelles de l'usager
$titre = "Mise à jour utilisateur";
include "vue/partials/entete.html.php";
include "vue/usager/miseAJourUsager.html.php";