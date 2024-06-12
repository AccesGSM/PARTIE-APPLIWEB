<?php

include_once "utilisateurModel.php";

function login($mail, $mdp): void
{
    if (!isset($_SESSION)) {
        session_start();
    }

    $util = getUtilisateurByMail($mail);
    $mdpBD = $util["mdp"];
    if (password_verify($mdp, $mdpBD)) {
        // le mot de passe est celui de l'utilisateur dans la base de donnees
        $_SESSION["mail"] = $mail;
        $_SESSION["mdp"] = $mdpBD;
        $_SESSION["admin"] = $util["admin"];
    }
}

function logout(): void
{
    if (!isset($_SESSION)) {
        session_start();
    }
    unset($_SESSION["mail"]);
    unset($_SESSION["mdp"]);
    unset($_SESSION["admin"]);
}

function isLoggedOn(): bool
{
    if (!isset($_SESSION)) {
        session_start();
    }
    $ret = false;

    if (isset($_SESSION["mail"])) {
        $util = getUtilisateurByMail($_SESSION["mail"]);

        if ($util["mail"] == $_SESSION["mail"] && $util["mdp"] == $_SESSION["mdp"]
        ) {
            $ret = true;
        }
    }
    return $ret;
}