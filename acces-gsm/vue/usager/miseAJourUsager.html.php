<h1>Mise à jour Usager</h1>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<?php if (isset($erreur_message)): ?>
    <p><?= htmlspecialchars($erreur_message, ENT_QUOTES) ?></p>
<?php endif; ?>
<form action="./?action=miseAJourUsager" method="POST">
    <div class="form-group">
        <input type="hidden" id="id" name="id" value="<?= htmlspecialchars($majUsager['id'], ENT_QUOTES) ?>">
    </div>
    <div class="form-group">
        <label for="nom">Nom de l'usager</label>
        <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($majUsager['nom'], ENT_QUOTES) ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prénom de l'usager</label>
        <input type="text" id="prenom" name="prenom" value="<?= htmlspecialchars($majUsager['prenom'], ENT_QUOTES) ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="telephone">Téléphone de l'usager</label>
        <input type="text" id="telephone" name="telephone" value="<?= htmlspecialchars($majUsager['telephone'], ENT_QUOTES) ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" value="<?= htmlspecialchars($majUsager['email'], ENT_QUOTES) ?>" required class="form-control">
    </div>
    <div class="form-group">
        <label for="autorise">Autorisation</label>
        <!-- Hidden field to ensure value 0 is sent if unchecked -->
        <input type="hidden" id="hiddenAutorise" name="autorise" value="0">
        <input type="checkbox" id="autorise" name="autorise_checkbox" value="1" <?= $majUsager['autorise'] == 1 ? 'checked' : '' ?> onclick="updateAutorise()">
    </div>

    <script>
        function updateAutorise() {
            var checkbox = document.getElementById('autorise');
            var hiddenInput = document.getElementById('hiddenAutorise');
            hiddenInput.value = checkbox.checked ? 1 : 0;
        }
    </script>
    <input type="submit" class="btn btn-primary" value="Envoyer"/>
</form>

