    <?php

    require_once "header.php";

    ?>



    <section class="container6">
        <div class="container6-1">
            <div class="container6-1-H">
                <div class="reservationTitre">Réservation</div>
            </div>
            <div class="container6-1-M">
                <div class="C6-Background">
                    <div class="C6-Bloc-Titre">
                        <div class="C6-Titre">Nos rendez-vous "art et émotion"</div>
                    </div>
                    <div class="C6-Bloc-Date">
                        <p class="dateVisite"><br></p>
                        <?php

                        setlocale(LC_TIME, 'fr_FR');
                        //On affiche les dates des évenements
                        $date = $bdd->query('SELECT * FROM (SELECT * FROM visite_date ORDER BY temps DESC LIMIT 0,7) visite_date ORDER BY id ASC');
                        $date->execute(array());
                        while ($D = $date->fetch()) {
                        ?>
                            <p class="dateVisite">Le <?php echo $varDate = ucfirst(strftime('%A %d ', strtotime($D['temps'])));
                                                        echo $varDate2 = utf8_encode(ucfirst(strftime('%B', strtotime($D['temps'])))); ?> à <?php echo $D['heure'] ?></p>
                        <?php
                        }
                        //Limite à 4 dates
                        ?>

                    </div>

                    <div class="C6-Bloc-3">

                        <p class="dateVisite">Visite adaptée aux adultes et aux adolescents.</p>
                    </div>
                    <div class="C6-Bloc-4">
                        <p class="dateVisite"><u>Départ :</u> Jardin Public ( entrée Place du Champ de Mars )</p>
                        <p class="dateVisite"><u>Fin :</u> Monument aux Girondins</p>
                        <p class="dateVisite"><u>Durée :</u> 02H00</p>
                        </br>
                        <a href="historique.php" class="historiqueDate">Historique des dates de visites</a>
                    </div>

                </div>

            </div>

            <div class="container6-1-B">
                <div class="container6-1Img">
                    <a class="page6-4" href="#partie2"><i class="fa-solid fa-circle-arrow-down"></i></a>
                </div>
            </div>
        </div>

    </section>

    <!--PAGE 2 CONTAINER 7-->
    <section class="container7" id="partie2">
        <div class="container7-1">
            <div class="container7-1-1">
                <div class="container7-1-Gauche">
                    <div class="C7-Bloc-Titre">
                        <div class="C7-Titre">Tarifs individuels</div>
                    </div>
                    <div class="C7-Bloc-Infos">
                        <p class="dateVisite">Adulte (16 ans et +) : 20 €</p>
                        <p class="dateVisite">Adolescent (12 - 15 ans) : 12 €</p>
                        <p class="dateVisite">Paiement sur place en espèce ou par chèque</p>
                        </br>
                        <div class="C7-Bloc-Titre">
                            <div class="C7-Titre">Groupes et visites privées</div>
                        </div>
                        <p class="groupePrive">Nous contacter</p>
                    </div>

                </div>
                <div class="container7-1-Droite">
                    <div class="C7-Bloc-Titre">
                        <div class="C7-Titre">Réservation</div>
                    </div>
                    <div class="C7-Bloc-Infos">
                        <p class="tel">06 77 60 95 97</p>
                        <p class="mail">lesconfidencesderosabonheur@gmail.com</p>
                    </div>
                </div>
            </div>
            <div class="container7-1-B">
                <div class="container7-1-CG">
                    <a class="lienpage" href="documents/cg.pdf">Conditions
                        générales de
                        vente </a> -/-
                    <a class="lienpage" href="documents/mentions.pdf"> Mentions
                        légales</a>
                </div>

            </div>

        </div>

    </section>

    <script src="app.js"></script>
    </body>

    </html>