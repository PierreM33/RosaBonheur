<?php

require_once "../include/connexion_bdd.php";


//if (isset($_POST['titre']) && isset($_POST['desc'])) {
if (isset($_POST['valider'])) {

    $titre = strip_tags(htmlspecialchars($_POST['titre']));
    $description = html_entity_decode($_POST['desc']);

    $lengthTitre = strlen($titre);
	
    //SEUL LE TITRE NE DOIT PAS ETRE VIDE
    if (!empty($titre) AND $lengthTitre <= 26) {


        if ($_FILES["file"]["error"] == 0) {

            //Recupération du nom du fichier
            $fileName = $_FILES["file"]["name"];

            //NomTemporaire
            $fileTMP_Name = $_FILES["file"]["tmp_name"];

            //RECUPERATION DU FORMAT
            $fileType = $_FILES["file"]["type"];
            // VERIFIER EXTENSION
            $validArray = array('.jpg', '.jpeg', '.gif', '.png', '.PNG');
            // VERIFIER EXTENSION
            $fileExt = '.' . strtolower(substr(strrchr($fileName, '.'), 1));

            //TAILLE FICHIER = 32M max
            $fileSize = $_FILES["file"]["size"];
            $MaxSize = 50000000;

            $dossier = "../img/uploadImages/" . $fileName;


            //VERIFICATION DU TABLEAU
            if (in_array($fileExt, $validArray)) {

                if ($fileSize <= $MaxSize) {
                    //
                    move_uploaded_file($fileTMP_Name, $dossier);
                    //On ajoute la requete
                    $Req = $bdd->prepare('INSERT INTO article (titre,image,description) VALUES (?,?,?)');
                    $Req->execute(array($titre, $fileName, $description));
                    //
                    $_SESSION['error'] = '<div class="valide">Article ajouté.</div>';
                    //
                } else
                    $_SESSION['error'] = '<div class="erreur">Le fichier est trop volumineux.</div>';
            } else
                $_SESSION['error'] = '<div class="erreur">Extension de l\'image n\'est pas conforme, seul les jpg, jpeg, png sont acceptés.</div>';
            //
            //SINON SI ERROR ON ENVOIE PAS L'IMAGE
        } elseif ($_FILES["file"]["error"] > 0) {

            $fileName = "";

            //On ajoute la requete
            $Req = $bdd->prepare('INSERT INTO article (titre,image,description) VALUES (?,?,?)');
            $Req->execute(array($titre, $fileName, $description));
            //
            $_SESSION['error'] = '<div class="valide">Article ajouté.</div>';
            //
        } else
            $_SESSION['error'] = '<div class="erreur">Erreur, de fichiers.</div>';
    } else
        $_SESSION['error'] = '<div class="erreur">Le titre doit être présent, ou celui-ci ne doit pas dépasser 26 caractères.</div>';
} else
    $_SESSION['error'] = '<div class="erreur">Erreur, veuillez contacter l\'administrateur.</div>';


header('Location: ..\views/administration.php');
