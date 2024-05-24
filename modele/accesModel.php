<?php
include_once "connexionModele.php";
function getAcces()
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT acces.id, acces.designation, acces.telephone, acces.port1, acces.nom1, acces.port2, acces.nom2
            FROM acces
        ";
        $req = $cnx->prepare($sql);
        $req->execute();
        $usagers = $req->fetchAll(PDO::FETCH_ASSOC);
        return $usagers;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function creerAcces($designation, $telephone, $port1, $nom1, $port2, $nom2)
{
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();

        // Ajouter un usager
        $sql_creer_usager = "
             INSERT INTO acces (designation, telephone, port1, nom1, port2, nom2)
            VALUES (
                :designation,
                :telephone,
                :port1,
                :nom1,
                :port2,
                :nom2
            )
        ";
        $req_creer_usager = $cnx->prepare($sql_creer_usager);
        $req_creer_usager->bindParam(':designation', $designation);
        $req_creer_usager->bindParam(':telephone', $telephone);
        $req_creer_usager->bindParam(':port1', $port1);
        $req_creer_usager->bindParam(':nom1', $nom1);
        $req_creer_usager->bindParam(':port2', $port2);
        $req_creer_usager->bindParam(':nom2', $nom2);
        $req_creer_usager->execute();

        $cnx->commit();

        return true;
    } catch (PDOException $e) {
        $cnx->rollBack();
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getAccesById($id)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT acces.id, acces.designation, acces.telephone, acces.port1, acces.nom1, acces.port2, acces.nom2
            FROM acces
            JOIN reservation ON reservation.access_id = acces.id
            WHERE acces.id = :id
        ";
        $req = $cnx->prepare($sql);
        $req->bindValue(':id', $id, PDO::PARAM_STR);
        $req->execute();

        $reservation = $req->fetch(PDO::FETCH_ASSOC);
        return $reservation;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function majAcces($id, $designation, $telephone, $port1, $nom1, $port2, $nom2)
{
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();

        // Mettre à jour la table usager
        $sql_acces = "
            UPDATE acces
            SET id = :id,designation = :designation,telephone = :telephone,port1 = :port1,nom1 = :nom1,port2 = :port2,nom2 = :nom2 
            WHERE id = :id
        ";
        $req_acces = $cnx->prepare($sql_acces);
        $req_acces->bindParam(':designation', $designation);
        $req_acces->bindParam(':telephone', $telephone);
        $req_acces->bindParam(':port1', $port1);
        $req_acces->bindParam(':nom1', $nom1);
        $req_acces->bindParam(':port2', $port2);
        $req_acces->bindParam(':nom2', $nom2);
        $req_acces->bindParam(':id', $id);
        $req_acces->execute();

        $cnx->commit();

        return true;

    } catch (PDOException $e) {
        $cnx->rollBack();
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

