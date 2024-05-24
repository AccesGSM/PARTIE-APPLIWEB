<?php
include_once "connexionModele.php";
function verifierReservation($telephone)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT reservation.date_debut, reservation.date_fin, reservation.heure, reservation.duree, reservation.cycle, usager.nom, usager.prenom
            FROM reservation
            JOIN usager
            ON reservation.usager_id = usager.id
            WHERE usager.telephone = :telephone
        ";
        $req = $cnx->prepare($sql);
        $req->bindValue(':telephone', $telephone,);
        $req->execute();
        $resultat = $req->fetchAll(PDO::FETCH_ASSOC);
        return $resultat;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
