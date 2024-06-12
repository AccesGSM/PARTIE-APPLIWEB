<h1>Mise à jour réservation</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php if (isset($erreur_message)): ?>
    <p><?= $erreur_message ?></p>
<?php endif; ?>
<form action="./?action=miseAJourReservation" method="POST">
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($majReservation['id']) ?>">
    </div>
    <div class="form-group">
        <label for="nom">Nom de l'usager</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($majReservation['nom']) ?>">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom de l'usager</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($majReservation['prenom']) ?>">
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone de l'usager</label>
        <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($majReservation['telephone']) ?>">
    </div>
    <div class="form-group">
        <label for="designation">Désignation de la réservation</label>
        <input type="text" id="designation" name="designation" value="<?= htmlspecialchars($majReservation['designation']) ?>">
    </div>
    <div class="form-group">
        <label for="date_debut">Date de début de la réservation</label>
        <input type="date" id="date_debut" name="date_debut" value="<?= htmlspecialchars($majReservation['date_debut']) ?>">
    </div>
    <div class="form-group">
        <label for="date_fin">Date de fin de la réservation</label>
        <input type="date" id="date_fin" name="date_fin" value="<?= htmlspecialchars($majReservation['date_fin']) ?>">
    </div>
    <div class="form-group">
        <label for="heure">Heure de la réservation</label>
        <input type="text" id="heure" name="heure" value="<?= htmlspecialchars($majReservation['heure']) ?>">
    </div>
    <div class="form-group">
        <label for="duree">Durée de la réservation (en heures)</label>
        <input type="number" id="duree" name="duree" step="1" value="<?= htmlspecialchars($majReservation['duree']) ?>">
    </div>
    <div class="form-group">
        <label for="cycle">Cycle</label>
        <input type="number" id="cycle" name="cycle" value="<?= htmlspecialchars($majReservation['cycle']) ?>">
    </div>

    <input type="submit" class="boutonMaj" value="Envoyer">
</form>
