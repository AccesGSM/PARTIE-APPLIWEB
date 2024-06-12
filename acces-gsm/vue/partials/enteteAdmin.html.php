<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <link rel="icon" href="/images/gsm.png">
    <title><?= $titre ?></title>
    <style type="text/css">
        @import url("/assets/css/base.css");
        @import url("/assets/css/form.css");
        @import url("/assets/css/utilisateurs.css");
        @import url("/assets/font-awesome/css/font-awesome.css");
    </style>
</head>
<body>
<nav>
    <ul id="menuGeneral">
        <li><a href="./?action=accueil"><i class="fa fa-home"></i> Accueil</a></li>
        <li><a href="./?action=reservation"><i class="fa fa-th-list"></i> Réservations</a></li>
        <li><a href="./?action=usagers"><i class="fa fa-th-list"></i> Usagers</a></li>
        <li><a href="./?action=acces"><i class="fa fa-th-list"></i> Accès</a></li>
        <li></li>
        <li><a href="./?action=deconnexion"><i class="fa fa-sign-out"></i> Déconnexion</a></li>
    </ul>
</nav>
<div id="bouton">
    <div></div>
    <div></div>
    <div></div>
</div>
<ul id="menuContextuel">
    <li><img src="/images/rechercheReservation_100.png" alt="logo accès GSM"/></li>
    <?php if (isset($menuRecherche)){ ?>
        <?php for ($i = 0; $i < count($menuRecherche); $i++) { ?>
            <li>
                <a href="<?= $menuRecherche[$i]['url']; ?>">
                    <?= $menuRecherche[$i]['label']; ?>
                </a>
            </li>
        <?php } ?>
    <?php } ?>
</ul>
<div id="corps">
