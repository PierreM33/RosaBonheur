<?php

require_once "../include/connexion_bdd.php";

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Rosa Bonheur à Bordeaux Inédit Visite théâtralisée à 2 voix " content="Pour le bicentenaire de sa naissance, écoutez les confidences de l’artiste Rosa Bonheur lors d’une déambulation à Bordeaux dans le quartier de son enfance ">
    <meta name="Une visite hybride pour un voyage dans le temps" content="Découvrez la vidéo de présentation de la visite Les confidences de Rosa Bonheur">
    <meta name="Le vœu exaucé d’une guide admirative du talent de l’artiste " content="Planning des visites guidées théâtralisées en compagnie de l’artiste peintre Rosa Bonheur">
    <meta name="Le vœu exaucé d’une guide admirative du talent de l’artiste " content="Interrogée par la guide, l’avant-gardiste, Rosa Bonheur, se raconte. Elle dévoile la couleur de ses sentiments et interroge la société d’aujourd’hui ">
    <meta name="2 guides passionnées par une artiste peintre hors du commun" content="Confidences, humour, anecdotes drôles et témoignages émouvants, un retour sur les moments clés de la vie de la peintre animalière dans un XIXe siècle corseté">
    <script src="//cdn.jsdelivr.net/npm/medium-editor@latest/dist/js/medium-editor.min.js"></script>
    <title>Rosa Bonheur</title>
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
    <link rel="manifest" href="favicon/site.webmanifest">
    <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
    require_once "style.php";
    ?>
</head>


<body>
    <header>
        <nav>
            <div class="logo">
                <div class="titre"></div>
            </div>
            <div class="toggle">
                <i class="fas fa-bars ouvrir" onClick="Masquer()"></i>
                <i class="fas fa-times fermer" onClick="Demasquer()"></i>
            </div>
            <ul class="menu">
                <li><a href="accueil.php">Accueil</a></li>
                <li><a href="visite.php">La Visite</a></li>
                <li><a href="duo.php">Le Duo</a></li>
                <li><a href="dynamique.php">La Dynamique</a></li>
                <li><a href="reservation.php">Réservation</a></li>
                <li><a href="blog.php">En Savoir Plus</a></li>

                <?php
                if (isConnected()) {
                ?>
                    <li><a href="administration.php">Administrer</a></li>
                    <li><a href="..\include/deconnexion.php">Déconnexion</a></li>
                <?php
                } else {
                ?>
                    <li><a href="connexion.php">Connexion</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>