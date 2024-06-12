<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Usagers</title>
</head>
<body>
<h2>Usagers</h2>
<table style="width: 75%;">
    <tr>
        <th>Id</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>E-mail</th>
        <th>Autorise</th>

    </tr>
    <?php foreach ($usagers as $usagers): ?>
        <tr>
            <td><?= $usagers['id']; ?></td>
            <td><?= $usagers['nom']; ?></td>
            <td><?= $usagers['prenom']; ?></td>
            <td><?= $usagers['telephone']; ?></td>
            <td><?= $usagers['email']; ?></td>
            <td><?= $usagers['autorise']; ?></td>
            <td class="text-center">
                <a href=./?action=formMiseAJourUsager&id=<?= $usagers['id'] ?> class="boutonMaj">MAJ</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p> <a href=./?action=creerUsager class="boutonAjout">Créer un Usager</a></p>
</body>
</html>
