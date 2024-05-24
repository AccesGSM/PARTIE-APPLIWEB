<?php
include_once 'modele/connexionModele.php';
include_once 'modele/accesModel.php';
include_once 'menuControleur.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérez les données de l'accès à mettre à jour en utilisant l'identifiant sécurisé
    $majAcces = getAccesById($id);

    // Vérifiez si les données de l'accès ont été récupérées avec succès
    if ($majAcces) {
        // appel du script de vue qui permet de gérer l'affichage des données
        $titre = "Mise à jour accès";
        include "vue/partials/entete.html.php";
        include "vue/acces/miseAJourAcces.html.php";
    } else {
        // Gérer le cas où aucun accès correspondant à l'identifiant n'est trouvé
        echo "Aucun accès trouvé avec l'identifiant $id.";
    }
} else {
    // Gérer le cas où l'identifiant de l'usager n'est pas valide
    echo "Identifiant d'accès invalide.";
}
?>