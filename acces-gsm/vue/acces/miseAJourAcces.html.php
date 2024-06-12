<!DOCTYPE html>
<html>
<head>
    <title>Mise à jour Accès</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <h1>Mise à jour Accès</h1>
    <?php if (isset($erreur_message)): ?>
        <p class="alert alert-danger"><?= htmlspecialchars($erreur_message) ?></p>
    <?php endif; ?>
    <form action="./?action=miseAJourAcces" method="POST">
        <div class="form-group">
            <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($majAcces['id']) ?>">
        </div>
        <div class="form-group">
            <label for="designation">Désignation</label>
            <input type="text" id="designation" name="designation" value="<?= htmlspecialchars($majAcces['designation']) ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="telephone">N° Téléphone</label>
            <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($majAcces['telephone']) ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="port1">Numéro du premier port</label>
            <input type="number" id="port1" name="port1" value="<?= htmlspecialchars($majAcces['port1']) ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="nom1">Nom 1</label>
            <input type="text" id="nom1" name="nom1" value="<?= htmlspecialchars($majAcces['nom1']) ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="port2">Numéro du deuxième port</label>
            <input type="number" id="port2" name="port2" value="<?= htmlspecialchars($majAcces['port2']) ?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="nom2">Nom 2</label>
            <input type="text" id="nom2" name="nom2" value="<?= htmlspecialchars($majAcces['nom2']) ?>" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Envoyer"/>
    </form>
</div>
</body>
</html>
