<?php

require_once "../include/connexion_bdd.php";



if (isset($_POST['supprimer'])) {


    $S = strip_tags($_POST['supprimer']);

    if (is_numeric($S)) {
        //ON SUPPRIMER L'ARTICLE EN QUESTION

        $Req = $bdd->prepare('DELETE  FROM article WHERE id = ?');
        $Req->execute(array($S));
        //
        $_SESSION['error'] = '<div class="valide">Article supprimé.</div>';
        //
    } else
        $_SESSION['error'] = '<div class="erreur">Il ne s\'agit pas d\'un nombre.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/administration.php#partie2');
