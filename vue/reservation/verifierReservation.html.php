<?php include_once 'vue/partials/entete1.html.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<body>
<div class="container mt-4">
    <h1>Résultat de la vérification de réservation</h1>
    <?php if ($verification): ?>
        <div class="table-responsive">
            <table class="table table-hover table-prim">
                <thead>
                <tr class="table-primary">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Heure</th>
                    <th>Durée</th>
                    <th>Cycle</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($verification as $reservation): ?>
                    <tr>
                        <td><?= $reservation['nom']; ?></td>
                        <td><?= $reservation['prenom']; ?></td>
                        <td><?= $reservation['date_debut']; ?></td>
                        <td><?= $reservation['date_fin']; ?></td>
                        <td><?= $reservation['heure']; ?></td>
                        <td><?= $reservation['duree']; ?></td>
                        <td><?= $reservation['cycle']; ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <p>Aucune réservation trouvée pour ce numéro de téléphone.</p>
    <?php endif; ?>
</div>
</body>
</html>
