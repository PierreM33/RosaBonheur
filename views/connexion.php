<?php

require_once "header.php";

if (isConnected()) {
    header('Location:..\index.php');
}


?>
<!-- PARTIE CONNEXION -->

<section class="containerConnexion">
    <div class="containerConnexion-1">
        <!-- On affiche les erreurs -->

        <?php require_once "blocErreur.php"; ?>

        <div class=" containerConnexion-2">
            <div class="blocHautConnexion">
                <div class="Connexion-2">connexion</div>
            </div>
            <form class="blocConnexionMilieu" action="..\<?php echo pathPhp(); ?>traitement_connexion.php" method="post">
                <div class="blocIntegreH">
                    <div class="blocConnexion">

                        <div class="cadre4-2">
                            <div class="labelInput">
                                <input class="input" type="text" id="nom" name="nom" placeholder="Utilisateur">
                            </div>

                        </div>
                        <div class="cadre4-2">
                            <div class="labelInput">
                                <input class="input" type="password" id="password" name="password" placeholder="Password">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="blocIntegreB">
                    <div class="bouton4-2">
                        <button class="bouton4" type="submit" value="connexion">Connexion</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>


<script src="app.js"></script>
</body>

</html>