<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un acces</title>
</head>
<body>
<h1>Créer un Accès</h1>
<?php if (isset($erreur_message)): ?>
    <p><?= $erreur_message ?></p>
<?php endif; ?>
<form action="./?action=creerAcces" method="POST">
    <div class="form-group" style="width: 425px">
        <label for="designation">Désignation</label>
        <input type="varchar" id="designation" name="designation" required>
    </div>

    <div class="form-group" style="width: 425px">
        <label for="telephone">N° Téléphone</label>
        <input type="varchar" id="telephone" name="telephone" required>
    </div>

    <div class="form-group">
        <label for="port1">Numéro du premier port</label>
        <input type="int" id="port1" name="port1" required>
    </div>
    <div class="form-group">
        <label for="nom1">Nom 1</label>
        <input type="varchar" id="nom1" name="nom1" required>
    </div>

    <div class="form-group">
        <label for="port2">Numéro du deuxième port</label>
        <input type="int" id="port2" name="port2" required>
    </div>

    <div class="form-group">
        <label for="nom2">Nom 2</label>
        <input type="varchar" id="nom2" name="nom2" required>
    </div>

    <input type="submit" class="boutonAjout" value="Créer un accès">
</form>
</body>
</html>