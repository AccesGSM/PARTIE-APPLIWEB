<!DOCTYPE html>
<html lang="fr">
<head>
    <title>Réservations d'accès</title>
</head>
<body>
<h2>Réservations d'accès</h2>
<table style="width: 100%;">
    <tr>
        <th>N°</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Téléphone</th>
        <th>Désignation</th>
        <th>date début</th>
        <th>date fin</th>
        <th>Heure</th>
        <th>Durée</th>
        <th>Cycle</th>
        <th>Suppr</th>
        <th>MAJ</th>

    </tr>
    <?php foreach ($reservations as $reservation): ?>
        <tr>
            <td><?= $reservation['id']; ?></td>
            <td><?= $reservation['nom']; ?></td>
            <td><?= $reservation['prenom']; ?></td>
            <td><?= $reservation['telephone']; ?></td>
            <td><?= $reservation['designation']; ?></td>
            <td><?= $reservation['date_debut']; ?></td>
            <td><?= $reservation['date_fin']; ?></td>
            <td><?= $reservation['heure']; ?></td>
            <td><?= $reservation['duree']; ?></td>
            <td><?= $reservation['cycle']; ?></td>
            <td>
                <a href=./?action=supprimerReservation&id=<?= $reservation['id'] ?>
                   onClick="return(confirm('Etes-vous sûr de vouloir supprimer la réservation <?= $reservation['id'] ?> de <?= $reservation['nom'] ?> <?= $reservation['prenom'] ?> ?'));" class="boutonSupp">SUPPR</a>
            </td>
            <td class="text-center">
                <a href=./?action=formMiseAJourReservation&id=<?= $reservation['id'] ?> class="boutonMaj">MAJ</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>
<p> <a href=./?action=creerReservation class="boutonAjout">Créer une réservation</a></p>
</body>
</html>
