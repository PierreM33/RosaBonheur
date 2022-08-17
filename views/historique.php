<?php

require_once "header.php";

?>
<section class="historique">
    <div class="containerHistorique">
        <div class="videHistorique"></div>
        <div class="containerBlogTitreHistorique">
            <div class="blogTitreHistorique">Historique des dates de visites</div>
        </div>
        <div class="blocHistorique">
            <?php
                    
                            setlocale(LC_TIME, 'fr_FR');
                        //On affiche les dates des évenements
            $date = $bdd->query('SELECT * FROM visite_date ORDER BY id');
            $date->execute(array());
            while ($D = $date->fetch()) {
                       ?>
                            <p class="dateVisite">Le <?php echo $varDate = ucfirst(strftime('%A %d ', strtotime($D['temps'])));
                                                        echo $varDate2 = utf8_encode(ucfirst(strftime('%B', strtotime($D['temps'])))); ?> à <?php echo $D['heure'] ?></p>
                        <?php
            }
            //Limite à 3 dates
            ?>
        </div>
    </div>
    <div class="blocRetour">
        <a href="reservation.php" class="buttonRetour">Retour</a>
    </div>

</section>
<div class="footer"></div>
<script src="app.js"></script>
</body>

</html>