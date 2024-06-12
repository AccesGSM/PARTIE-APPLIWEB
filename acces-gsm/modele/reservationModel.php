<?php
include_once "connexionModele.php";

function getReservations()
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT reservation.id,reservation.date_debut, reservation.date_fin, reservation.heure, reservation.duree, reservation.cycle, usager.nom, usager.prenom, usager.telephone,acces.designation
            FROM reservation
            JOIN usager ON reservation.usager_id = usager.id
            JOIN acces ON reservation.acces_id = acces.id;
        ";
        $req = $cnx->prepare($sql);
        $req->execute();
        $reservations = $req->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getReservationById($id)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT reservation.id,reservation.date_debut, reservation.date_fin, reservation.heure, reservation.duree, reservation.cycle, usager.nom, usager.prenom, usager.telephone,acces.designation
            FROM reservation
            JOIN usager ON reservation.usager_id = usager.id
            JOIN acces ON reservation.acces_id = acces.id
            WHERE reservation.id = :id
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

function majReservation($id, $date_debut, $date_fin, $heure, $duree, $cycle, $nom, $prenom, $telephone, $designation) {
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();

        // Mettre à jour la table reservation
        $sql_reservation = "
            UPDATE reservation
            SET date_debut = :date_debut, date_fin = :date_fin, heure = :heure, duree = :duree, cycle = :cycle
            WHERE id = :id
        ";
        $req_reservation = $cnx->prepare($sql_reservation);
        $req_reservation->bindParam(':date_debut', $date_debut);
        $req_reservation->bindParam(':date_fin', $date_fin);
        $req_reservation->bindParam(':heure', $heure);
        $req_reservation->bindParam(':duree', $duree);
        $req_reservation->bindParam(':cycle', $cycle);
        $req_reservation->bindParam(':id', $id);
        $req_reservation->execute();

        // Mettre à jour la table usager
        $sql_usager = "
            UPDATE usager
            SET nom = :nom, prenom = :prenom, telephone = :telephone
            WHERE id = (
                SELECT usager_id
                FROM reservation
                WHERE id = :reservation_id
            )
        ";
        $req_usager = $cnx->prepare($sql_usager);
        $req_usager->bindParam(':nom', $nom);
        $req_usager->bindParam(':prenom', $prenom);
        $req_usager->bindParam(':telephone', $telephone);
        $req_usager->bindParam(':reservation_id', $id);
        $req_usager->execute();

        // Mettre à jour la table acces
        $sql_acces = "
            UPDATE acces
            SET designation = :designation
            WHERE id = (
                SELECT acces_id
                FROM reservation
                WHERE id = :reservation_id
            )
        ";
        $req_acces = $cnx->prepare($sql_acces);
        $req_acces->bindParam(':designation', $designation);
        $req_acces->bindParam(':reservation_id', $id);
        $req_acces->execute();

        $cnx->commit();

        return true;

    } catch (PDOException $e) {
        $cnx->rollBack();
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function creerReservation($usager_id, $designation, $date_debut, $heure_debut, $duree, $cycle)
{
    try {
        $cnx = connexionPDO();
        $cnx->beginTransaction();

        // Vérifier si le créneau est disponible
        $sql_verif_disponibilite = "
            SELECT id
            FROM reservation
            WHERE date_debut = :date_debut
            AND heure = :heure_debut
        ";
        $req_verif_disponibilite = $cnx->prepare($sql_verif_disponibilite);
        $req_verif_disponibilite->bindParam(':date_debut', $date_debut);
        $req_verif_disponibilite->bindParam(':heure_debut', $heure_debut);
        $req_verif_disponibilite->execute();
        $resultat_verif_disponibilite = $req_verif_disponibilite->fetch(PDO::FETCH_ASSOC);

        if ($resultat_verif_disponibilite) {
            // Le créneau est déjà réservé
            return false;
        }

        // Ajouter la réservation
        $sql_creer_reservation = "
             INSERT INTO reservation (usager_id, acces_id, date_debut, date_fin, heure, duree, cycle)
            VALUES (
                :usager_id,
                (SELECT id FROM acces WHERE designation = :designation),
                :date_debut,
                DATE_ADD(:date_debut, INTERVAL :duree HOUR),
                :heure_debut,
                :duree,
                :cycle
            )
        ";
        $req_creer_reservation = $cnx->prepare($sql_creer_reservation);
        $req_creer_reservation->bindParam(':usager_id', $usager_id);
        $req_creer_reservation->bindParam(':designation', $designation);
        $req_creer_reservation->bindParam(':date_debut', $date_debut);
        $req_creer_reservation->bindParam(':heure_debut', $heure_debut);
        $req_creer_reservation->bindParam(':duree', $duree);
        $req_creer_reservation->bindParam(':cycle', $cycle);
        $req_creer_reservation->execute();

        $cnx->commit();

        return true;
    } catch (PDOException $e) {
        $cnx->rollBack();
        print "Erreur !: " . $e->getMessage();
        die();
    }
}


function getReservationsByNom($nom)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT reservation.id,reservation.date_debut, reservation.date_fin, reservation.heure, reservation.duree, reservation.cycle, usager.nom, usager.prenom, usager.telephone,acces.designation
            FROM reservation
            JOIN usager ON reservation.usager_id = usager.id
            JOIN acces ON reservation.acces_id = acces.id
            WHERE usager.nom like :nom
        ";
        $req = $cnx->prepare($sql);
        $req->bindValue(':nom', "%" . $nom . "%", PDO::PARAM_STR);
        $req->execute();
        $reservations = $req->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getReservationsByTelephone($telephone)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT reservation.id,reservation.date_debut, reservation.date_fin, reservation.heure, reservation.duree, reservation.cycle, usager.nom, usager.prenom, usager.telephone,acces.designation
            FROM reservation
            JOIN usager ON reservation.usager_id = usager.id
            JOIN acces ON reservation.acces_id = acces.id
            WHERE usager.telephone like :telephone
        ";
        $req = $cnx->prepare($sql);
        $req->bindValue(':telephone', "%" . $telephone . "%", PDO::PARAM_STR);
        $req->execute();
        $reservations = $req->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getReservationsByDesignation($designation)
{
    try {
        $cnx = connexionPDO();
        $sql = "
            SELECT reservation.id,reservation.date_debut, reservation.date_fin, reservation.heure, reservation.duree, reservation.cycle, usager.nom, usager.prenom, usager.telephone,acces.designation
            FROM reservation
            JOIN usager ON reservation.usager_id = usager.id
            JOIN acces ON reservation.acces_id = acces.id
            WHERE acces.designation like :designation
        ";
        $req = $cnx->prepare($sql);
        $req->bindValue(':designation', "%" . $designation . "%", PDO::PARAM_STR);
        $req->execute();
        $reservations = $req->fetchAll(PDO::FETCH_ASSOC);
        return $reservations;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function delReservation($id)
{
    $resultat = -1;
    try {
        $cnx = connexionPDO();

        $req = $cnx->prepare("delete from reservation  where id=:id");
        $req->bindValue(':id', $id, PDO::PARAM_STR);

        $resultat = $req->execute();

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
    return $resultat;
}

function getAccessDesignations() {
    try {
        $cnx = connexionPDO();
        $sql = "SELECT designation FROM acces";
        $stmt = $cnx->query($sql);
        $designations = $stmt->fetchAll(PDO::FETCH_COLUMN);
        return $designations;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

function getUsagers() {
    try {
        $cnx = connexionPDO();
        $sql = "SELECT id, nom, prenom FROM usager";
        $stmt = $cnx->query($sql);
        $usagers = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $usagers;
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage();
        die();
    }
}

