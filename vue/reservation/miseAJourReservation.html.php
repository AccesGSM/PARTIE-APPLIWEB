<h1>Mise à jour réservation</h1>
<?php if (isset($erreur_message)): ?>
    <p><?= $erreur_message ?></p>
<?php endif; ?>
<form action="./?action=miseAJourReservation" method="POST">
    <div class="form-group">
<!--        <label for="nom">Numéro de réservation non modifiable</label>-->
        <input type="hidden" id="id" name="id" value="<?= $majReservation['id'] ?>">
    </div>
    <div class="form-group">
        <label for="nom">Nom de l'usager</label>
        <input type="text" id="nom" name="nom" placeholder="<?= $majReservation['nom'] ?>">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom de l'usager</label>
        <input type="text" id="prenom" name="prenom" placeholder="<?= $majReservation['prenom'] ?>">
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone de l'usager</label>
        <input type="text" id="telephone" name="telephone" placeholder="<?= $majReservation['telephone'] ?>">
    </div>
    <div class="form-group">
        <label for="designation">Désignation de la réservation</label>
        <input type="text" id="designation" name="designation" placeholder="<?= $majReservation['designation'] ?>">
    </div>
    <div class="form-group">
        <label for="date_debut">Date de début de la réservation</label>
        <input type="text" id="date_debut" name="date_debut" placeholder="<?= $majReservation['date_debut'] ?>">
    </div>
    <div class="form-group">
        <label for="date_fin">Date de fin de la réservation</label>
        <input type="text" id="date_fin" name="date_fin" placeholder="<?= $majReservation['date_fin'] ?>">
    </div>
    <div class="form-group">
        <label for="heure">Heure de la réservation</label>
        <input type="int" id="heure" name="heure" placeholder="<?= $majReservation['heure'] ?>">
    </div>
    <div class="form-group">
        <label for="duree">Durée de la réservation (en heures)</label>
        <input type="number" id="duree" name="duree" step="1" placeholder="<?= $majReservation['duree'] ?>">
    </div>
    <div class="form-group">
        <label for="cycle">Cycle</label>
        <input type="int" id="cycle" name="cycle" placeholder="<?= $majReservation['cycle'] ?>">
    </div>

    <input type="submit" class="boutonMaj" value="Envoyer"/>
</form>
