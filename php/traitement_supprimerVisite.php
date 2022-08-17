<?php

require_once "../include/connexion_bdd.php";



if (isset($_POST['supprimer'])) {


    $S = strip_tags($_POST['supprimer']);

    if (is_numeric($S)) {
        //ON SUPPRIMER LA DATE

        $Req = $bdd->prepare('DELETE  FROM visite_date WHERE id = ?');
        $Req->execute(array($S));
        //
        $_SESSION['error'] = '<div class="valide">Date supprimé.</div>';
        //
    } else
        $_SESSION['error'] = '<div class="erreur">Il ne s\'agit pas d\'un nombre.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/administration.php#partie4');
