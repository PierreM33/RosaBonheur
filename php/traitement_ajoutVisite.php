<?php

require_once "../include/connexion_bdd.php";


if (isset($_POST['date']) && isset($_POST['heure'])) {

    if (!empty($_POST['date']) && !empty($_POST['heure'])) {


        $date1 = strtr($_REQUEST['date'], '/', '-');
        $dateFinale = date('Y-m-d', strtotime($date1));
        $heure = strip_tags(htmlspecialchars($_POST['heure']));



        //ON INSERE DANS LA LISTE DES DATES
        $In = $bdd->prepare('INSERT INTO visite_date (heure,temps) VALUES(?,?)');
        $In->execute(array($heure, $dateFinale));
        //
        $_SESSION['error'] = '<div class="valide">Date ajouté</div>';
        //
    } else
        $_SESSION['error'] = '<div class="erreur">Un des champs est vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/administration.php#partie3');