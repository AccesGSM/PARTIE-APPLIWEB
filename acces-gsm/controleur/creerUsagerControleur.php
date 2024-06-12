<?php
include_once 'modele/connexionModele.php';
include_once 'modele/usagersModel.php';
include_once 'menuControleur.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Vérification des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $autorise = $_POST['autorise'];

    // Appel de la fonction pour ajouter une réservation
    $resultat = creerUsager($nom, $prenom, $telephone, $email, $autorise);

    if ($resultat) {
        // Redirection vers la page de réservations après l'ajout
        header('Location: ./?action=usagers');
        exit();
    } else {
        // En cas d'erreur, afficher un message d'erreur
        $erreur_message = "Une erreur s'est produite lors de l'ajout de la réservation.";
    }
}
// Pour récupérer la liste des désignations des accès et des usagers
$autorisation = getAutorise();
$usagers = getUsager();

$titre = "Créer un usager";
include_once 'vue/partials/enteteAdmin.html.php';
include_once 'vue/usager/creerUsager.html.php';