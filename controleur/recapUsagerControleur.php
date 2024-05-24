<?php
include_once 'modele/connexionModele.php';
include_once 'modele/usagersModel.php';
include_once 'menuControleur.php';

if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);

    // Récupérez les données de l'usager à mettre à jour en utilisant l'identifiant sécurisé
    $majUsager = getUsagerById($id);

    // Vérifiez si les données de l'usager ont été récupérées avec succès
    if($majUsager) {
        // appel du script de vue qui permet de gérer l'affichage des données
        $titre = "Mise à jour utilisateur";
        include "vue/partials/entete.html.php";
        include "vue/usager/miseAJourUsager.html.php";
    } else {
        // Gérer le cas où aucun usager correspondant à l'identifiant n'est trouvé
        echo "Aucun usager trouvé pour l'identifiant spécifié.";
    }
} else {
    // Gérer le cas où l'identifiant de l'usager n'est pas valide
    echo "Identifiant d'usager invalide.";
}