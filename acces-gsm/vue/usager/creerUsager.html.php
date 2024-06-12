<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un usager</title>
</head>
<body>
<h1>Créer un usager</h1>
<?php if (isset($erreur_message)): ?>
    <p><?= $erreur_message ?></p>
<?php endif; ?>
<form action="./?action=creerUsager" method="POST">
    <div class="form-group" style="width: 425px">
        <label for="nom">Nom de l'usager</label>
        <input type="varchar" id="nom" name="nom" required>
    </div>

    <div class="form-group" style="width: 425px">
        <label for="prenom">Prénom de l'usager</label>
        <input type="varchar" id="prenom" name="prenom" required>
    </div>

    <div class="form-group">
        <label for="telephone">Numéro de téléphone</label>
        <input type="varchar" id="telephone" name="telephone" required>
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="varchar" id="email" name="email" required>
    </div>

    <div class="form-group">
        <label for="autorise">Autorisation</label>
        <select id="autorise" name="autorise" required>
            <?php foreach ($autorisation as $autorisation): ?>
                <option value="<?= $autorisation ?>"><?= $autorisation ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <input type="submit" class="boutonAjout" value="Créer un usager">
</form>
</body>
</html>