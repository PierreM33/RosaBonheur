<?php

require_once "../include/connexion_bdd.php";



if (isset($_POST['complet'])) {


    $S = strip_tags($_POST['complet']);

    if (is_numeric($S)) {
        //ON SUPPRIMER LA DATE

        $Req = $bdd->prepare('UPDATE visite_date  SET full = ? WHERE id = ?');
        $Req->execute(array(1, $S));
        //
        $_SESSION['error'] = '<div class="valide">Date complète.</div>';
        //
    } else
        $_SESSION['error'] = '<div class="erreur">Il ne s\'agit pas d\'un nombre.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/administration.php#partie4');
