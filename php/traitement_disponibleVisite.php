<?php

require_once "../include/connexion_bdd.php";



if (isset($_POST['disponible'])) {


    $S = strip_tags($_POST['disponible']);

    if (is_numeric($S)) {
        //ON SUPPRIMER LA DATE

        $Req = $bdd->prepare('UPDATE visite_date  SET full = ? WHERE id = ?');
        $Req->execute(array(0, $S));
        //
        $_SESSION['error'] = '<div class="valide">Date disponible.</div>';
        //
    } else
        $_SESSION['error'] = '<div class="erreur">Il ne s\'agit pas d\'un nombre.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/administration.php#partie4');
