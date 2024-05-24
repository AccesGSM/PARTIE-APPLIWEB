<?php
include_once "modele/connexionModele.php";
header("Content-Type: application/json");

$telephone = $_GET['telephone'];

$telephone = filter_var($telephone, FILTER_SANITIZE_NUMBER_INT);
$telephone = preg_replace("/[^0-9]/", "", $telephone);

if (strlen($telephone) === 10) {
    $query = "
    SELECT 
        usager.nom AS nom, 
        usager.prenom AS prenom,
        DATE_FORMAT(MAX(reservation.date_debut), '%d/%m/%y') AS date_debut,
        DATE_FORMAT(MAX(reservation.date_fin), '%d/%m/%y') AS date_fin,
        MAX(reservation.heure) AS heure, 
        MAX(reservation.duree) AS duree,
        reservation.cycle AS cycle,
        acces.designation AS designation_acces
    FROM 
        usager
    LEFT JOIN 
        reservation ON usager.id = reservation.usager_id
    LEFT JOIN 
        acces ON reservation.acces_id = acces.id
    WHERE 	
        usager.telephone = :telephone
    GROUP BY 
        usager.id, 
        usager.nom, 
        usager.prenom,
        acces.id,
        reservation.cycle
    ORDER BY 
        usager.nom, 
        usager.prenom
        ";


try {
    $conn = connexionPDO();
    $req = $conn->prepare($query);
    $req->bindParam(':telephone', $telephone, PDO::PARAM_STR);
    $req->execute();
    $result = $req->fetch(PDO::FETCH_ASSOC);
    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode(array("message" => "Aucun usager trouvé pour le téléphone $telephone"));
    }
} catch (PDOException $e) {
    echo json_encode(array("message" => "Erreur : " . $e->getMessage()));
}
} else {
    echo "Le numéro de téléphone n'est pas valide.";
}