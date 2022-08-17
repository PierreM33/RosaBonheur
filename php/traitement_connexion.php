<?php

require_once "../include/connexion_bdd.php";



if (isset($_POST['nom']) && isset($_POST['password'])) {

    $nom = strip_tags(htmlspecialchars($_POST['nom']));
    $password = strip_tags(htmlspecialchars($_POST['password']));


    //RECUPERATION DU MEMBRE
    $verif = $bdd->prepare('SELECT * FROM membre WHERE user = :user');
    $verif->bindValue('user', $nom);
    $verif->execute();
    $V = $verif->fetch(PDO::FETCH_ASSOC);

    //VERIFICATION DU PASSWORD
    $passwordHash = $V['password'];


    //ON VERIFIE QUE LES CHAMPS NE SOIENT PAS VIDE
    if (!empty($nom) and !empty($password)) {

        //VERIFIER QUE LE PSEUDO EXISTE
        if ($V['user'] == $nom) {

            //VERIFICATION DU PASSWORD HASH
            if (password_verify($password, $passwordHash)) {



                //AJOUTER LA SESSION AU MEMBRE
                $_SESSION['id'] = $V['id'];
                $_SESSION['user'] = $V['user'];


                //ON REDIRIGE VERS LA PAGE
                $_SESSION['error'] = '<div class="valide">Administrateur connecté.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">Erreur de password.</div>';
        } else
            $_SESSION['error'] = '<div class="erreur">Le nom n\'existe pas.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Au moins un des champs est vide.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/connexion.php');
