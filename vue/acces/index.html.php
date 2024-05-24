<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Accès</title>
</head>
<body>
<h2>Accès</h2>
<table style="width: 75%;">
    <tr>
        <th>Id</th>
        <th>Désignation</th>
        <th>Téléphone</th>
        <th>Port 1</th>
        <th>Nom 1</th>
        <th>Port 2</th>
        <th>Nom 2</th>
        <th></th>

    </tr>
    <?php foreach ($acces as $acces): ?>
        <tr>
            <td><?= $acces['id']; ?></td>
            <td><?= $acces['designation']; ?></td>
            <td><?= $acces['telephone']; ?></td>
            <td><?= $acces['port1']; ?></td>
            <td><?= $acces['nom1']; ?></td>
            <td><?= $acces['port2']; ?></td>
            <td><?= $acces['nom2']; ?></td>
            <td class="text-center">
                <a href=./?action=formMiseAJourAcces&id=<?= $acces['id'] ?> class="boutonMaj">MAJ</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p> <a href=./?action=creerAcces class="boutonAjout">Créer un Accès</a></p>
</body>
</html>
