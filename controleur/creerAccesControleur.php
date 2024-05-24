<?php
include_once 'modele/connexionModele.php';
include_once 'modele/accesModel.php';
include_once 'menuControleur.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des données du formulaire
    $designation = $_POST['designation'];
    $telephone = $_POST['telephone'];
    $port1 = $_POST['port1'];
    $nom1 = $_POST['nom1'];
    $port2 = $_POST['port2'];
    $nom2 = $_POST['nom2'];

    // Appel de la fonction pour ajouter une réservation
    $resultat = creerAcces($designation, $telephone, $port1, $nom1, $port2, $nom2);

    if ($resultat) {
        // Redirection vers la page de réservations après l'ajout
        header('Location: ./?action=acces');
        exit();
    } else {
        // En cas d'erreur, afficher un message d'erreur
        $erreur_message = "Une erreur s'est produite lors de l'ajout de l'acces.";
    }
}
// Pour récupérer la liste des désignations des accès et des usagers


$titre = "Créer un acces";
include_once 'vue/partials/entete.html.php';
include_once 'vue/acces/creerAcces.html.php';