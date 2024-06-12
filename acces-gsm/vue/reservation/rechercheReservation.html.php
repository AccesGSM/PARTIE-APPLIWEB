<h1>Recherche d'une réservation</h1>
<form action="./?action=rechercheReservation&critere=<?= $critere ?>" method="POST">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <?php
    switch ($critere) {
        case "nom":
            ?>
            <p>Recherche par nom : </p>
            <input type="text" name="nom" placeholder="nom" value="<?= $nom ?>"><br>
            <?php
            break;
        case "telephone":
            ?>
            <p>Recherche par téléphone : </p>
            <input type="text" name="telephone" placeholder="téléphone" value="<?= $telephone ?>"><br>
            <?php
            break;
        case "designation":
            ?>
            <p>Recherche par désignation : </p>
            <input type="text" name="designation" placeholder="désignation" value="<?= $designation ?>"><br>
            <?php
            break;
    }
    ?>

    <p><input type="submit" value="Rechercher"></p>
</form>
