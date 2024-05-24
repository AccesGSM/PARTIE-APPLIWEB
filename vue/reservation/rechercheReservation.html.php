<h1>Recherche d'une réservation</h1>
<form action="./?action=rechercheReservation&critere=<?= $critere ?>" method="POST">

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

