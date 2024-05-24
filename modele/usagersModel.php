<?php
include_once "connexionModele.php";
function getUsager()
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT *
            FROM usager
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
function creerUsager($nom, $prenom, $telephone, $email, $autorise)
{
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();

        // Ajouter un usager
        $sql_creer_usager = "
             INSERT INTO usager (nom, prenom, telephone, email, autorise)
            VALUES (
                :nom,
                :prenom,
                :telephone,
                :email,
                :autorise
            )
        ";
        $req_creer_usager = $cnx->prepare($sql_creer_usager);
        $req_creer_usager->bindParam(':nom', $nom);
        $req_creer_usager->bindParam(':prenom', $prenom);
        $req_creer_usager->bindParam(':telephone', $telephone);
        $req_creer_usager->bindParam(':email', $email);
        $req_creer_usager->bindParam(':autorise', $autorise);
        $req_creer_usager->execute();

        $cnx->commit();

        return true;
    } catch (PDOException $e) {
        $cnx->rollBack();
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getAutorise() {
    try {
        $cnx = connexionPDO();
        $sql = "SELECT Distinct autorise FROM usager";
        $stmt = $cnx->query($sql);
        $autorisation = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $autorisation;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
function getUsagerById($id)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT usager.id, usager.nom, usager.prenom, usager.telephone, usager.email, usager.autorise
            FROM usager
            JOIN reservation ON reservation.usager_id = usager.id
            WHERE usager.id = :id
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
function majUsager($id, $email, $nom, $prenom, $telephone, $autorise)
{
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();

        // Mettre à jour la table usager
        $sql_usager = "
            UPDATE usager
            SET nom = :nom, prenom = :prenom, telephone = :telephone, email = :email, autorise = :autorise 
            WHERE id = :id
        ";
        $req_usager = $cnx->prepare($sql_usager);
        $req_usager->bindParam(':nom', $nom);
        $req_usager->bindParam(':prenom', $prenom);
        $req_usager->bindParam(':telephone', $telephone);
        $req_usager->bindParam(':email', $email);
        $req_usager->bindParam(':autorise', $autorise);
        $req_usager->bindParam(':id', $id);
        $req_usager->execute();

        $cnx->commit();

        return true;

    } catch (PDOException $e) {
        $cnx->rollBack();
        print "Erreur !: " . $e->getMessage();
        die();
    }
}
