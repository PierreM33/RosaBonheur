<?php

require_once "header.php";

?>



<section class="containerReservation">
    <div class="containerReservation-1">
        <div class="blocVideReservation"></div>
        <div class="containerReservation-1-H">
            <div class="reservationTitreReservation">Réservation</div>
        </div>
        <div class="blocReservationCentrale">
            <div class="backgroundReservation-1">
                <div class="blocHaut-2">Nos rendez-vous "art et émotion"</div>
                <div class="blocBas-2">

                    <div class="groupementBlocGauche">
                        <img src="/img/affiche.jpg" alt="" class="imageAfficheReservation">
                    </div>
                    <div class="groupementBlocMilieu">
                        <div class="blocDate">
                            <?php

                            setlocale(LC_TIME, 'fr_FR');
                            //On affiche les dates des évenements
                            $date = $bdd->query('SELECT * FROM (SELECT * FROM visite_date ORDER BY temps DESC LIMIT 0,8) visite_date ORDER BY id ASC');
                            $date->execute(array());
                            while ($D = $date->fetch()) {
                                if ($D['full'] == 0) {
                            ?>

                                    <p>Le <?php echo $varDate = ucfirst(strftime('%A %d ', strtotime($D['temps'])));
                                            echo $varDate2 = utf8_encode(ucfirst(strftime('%B', strtotime($D['temps'])))); ?> à <?php echo $D['heure'] ?></p>
                                <?php
                                } else {
                                ?>
                                    <p class="full">Le <?php echo $varDate = ucfirst(strftime('%A %d ', strtotime($D['temps'])));
                                                        echo $varDate2 = utf8_encode(ucfirst(strftime('%B', strtotime($D['temps'])))); ?> <b>(Complet)</b></p>

                            <?php
                                }
                            }
                            //Limite à 4 dates
                            ?>
                        </div>
                        <div class="blocInformation">Visite adaptée aux adultes et aux adolescents.</div>
                        <div class="blocInformation-2">
                            <p><u>Départ :</u> Jardin Public ( entrée Place du Champ de Mars )</p>
                            <p><u>Fin :</u> Monument aux Girondins</p>
                            <p><u>Durée :</u> 02H00</p>
                            </br>
                            <!-- <a href="historique.php" class="historiqueDate">Historique des dates de visites</a>-->
                        </div>
                    </div>
                    <div class="groupementBlocDroite">
                        <img src="/img/logo_asso.png" alt="" class="imageLogoReservation">
                    </div>

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