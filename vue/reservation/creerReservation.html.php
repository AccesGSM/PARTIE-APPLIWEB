<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer une réservation</title>
</head>
<body>
<h1>Créer une réservation</h1>
<?php if (isset($erreur_message)): ?>
    <p><?= $erreur_message ?></p>
<?php endif; ?>
<form action="./?action=creerReservation" method="POST">
    <div class="form-group" style="width: 425px">
        <label for="usager">Nom de l'usager</label>
        <select id="usager" name="usager" required>
            <?php foreach ($usagers as $usager): ?>
                <option value="<?= $usager['id'] ?>"><?= $usager['nom'] ?> <?= $usager['prenom'] ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group" style="width: 425px">
        <label for="designation">Désignation de la réservation</label>
        <select id="designation" name="designation" required>
            <?php foreach ($descriptions as $description): ?>
                <option value="<?= $description ?>"><?= $description ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="form-group">
        <label for="date_debut">Date de début de la réservation</label>
        <input type="date" id="date_debut" name="date_debut" required>
    </div>
    <div class="form-group">
        <label for="heure_debut">Heure de début de la réservation</label>
        <input type="int" id="heure_debut" name="heure_debut" required>
    </div>
    <div class="form-group">
        <label for="duree">Durée de la réservation (en heures)</label>
        <input type="number" id="duree" name="duree"  step="1" required>
<!--        <input type="int" id="duree" name="duree"  required>-->
    </div>
    <div class="form-group">
        <label for="cycle">Cycle</label>
        <input type="int" id="cycle" name="cycle" required>
    </div>

    <input type="submit" class="boutonAjout" value="Créer une réservation">
</form>
</body>
</html>
