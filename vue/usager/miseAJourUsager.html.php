<h1>Mise à jour Usager</h1>
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
    <div cl ass="form-group">
        <label for="autorise">Autorisation</label>
        <input type="hidden" name="autorise" value="0"> <!-- Hidden field to ensure value 0 is sent if unchecked -->
        <input type="checkbox" id="autorise" name="autorise" value="1" <?= $majUsager['autorise'] == 1 ? 'checked' : '' ?>>
    </div>
    <input type="submit" class="btn btn-primary" value="Envoyer"/>
</form>

