<?php

//ON SE CONNECTE A LA BDD
require_once "../include/connexion_bdd.php";


if (isConnected()) {


    require_once "header.php";

    $ID = $_SESSION['id'];

    //verification du rang
    $rang = $bdd->prepare('SELECT * FROM membre WHERE id=?');
    $rang->execute(array($ID));
    $Rang = $rang->fetch();

    $RangMembre = $Rang['rang'];

    //SI le rang est bon on peut accéder
    if ($RangMembre == 1) {
?>

        <section class="sectionPrivate" id="ajouter">
            <div class="containerPrivate">
                <div class="videPrivate"></div>
                <div class="blocTitrePrivate">
                    <div class="titrePrivate">ADMINISTRATION</div>
                </div>
                <div class="blocPrivate">
                    <div class="blocHautPrivate">
                        <div class="blocTitreAjouter">
                            <h1>Ajouter un article au blog</h1>
                        </div>
                        <div class="blocTitreLiens">
                            <a class="lien" href="#ajouter">Ajouter un article -</a>
                            <a class="lien" href="#partie2"> - Liste Articles -</a>
                            <a class="lien" href="#partie3"> - Date Visite -</a>
                            <a class="lien" href="#partie4"> - Liste des Visite</a>
                        </div>

                        <?php
                        require_once "blocErreur.php";
                        ?>

                        <div class="englobeFormulaire">
                            <form enctype="multipart/form-data" class="formulaireAjouteBlog" action="..\<?php echo pathPhp(); ?>traitement_ajoutBlog.php" method="POST">
                                <div class="titreImage">
                                    <div class="blocAjoutGabarit">
                                        <label class="TitreBlog">Titre</label>
                                        <input class="AjoutBlog" type="text" id="titre" name="titre">
                                    </div>
                                    <div class="blocAjoutGabarit">
                                        <label class="TitreBlog">Image</label>
                                        <input class="AjoutBlog" type="file" id="file" name="file">
                                    </div>
                                </div>
                                <div class="blocTextarea">
                                    <div class="blocAjoutGabaritDescription">
                                        <label class="TitreBlogDescription">Description</label>
                                        <textarea class="AjoutBlogDescription" type="text" id="desc" name="desc"></textarea>
                                    </div>
                                </div>
                                <div class="blocBoutonPrivate">
                                    <input type="submit" class="boutonPrivateValider" value="Valider" name="valider">
                                </div>

                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </section>

        <section class="containerListeArticle" id="partie2">
            <div class="containerListeArticle1">
                <div class="separationArticle">
                    <div class="titrePrivate">LISTE ARTICLES</div>
                </div>
                <div class="blocTableauListeArticle">

                    <table class="listeArticle">
                        <tr>
                            <th class="artLST">Titre</th>
                            <th class="artLST">Image</th>
                            <th class="artLSTDesc">Description</th>
                            <th class="artLSTSuppr">Supprimer</th>
                        </tr>

                        <?php
                        //liste des articles
                        $liste = $bdd->prepare('SELECT * FROM article');
                        $liste->execute(array());
                        while ($Art = $liste->fetch()) {

                        ?>
                            <tr>
                                <td><?php echo $Art['titre']; ?></td>
                                <?php
                                if (!empty($Art['image'])) {
                                ?>
                                    <td><img class="imageTd" src="<?php echo pathImg();
                                                                    echo $Art['image']; ?>"><?php echo $Art['image']; ?></img></td>

                                <?php
                                } else {
                                    echo "<td> Aucune image</td>";
                                }
                                ?>
                                <td class="DescTd"><?php echo substr($Art['description'], 0, 150); ?> ....</td>
                                <form method="POST" class="formulaireSupprimer" action="..\<?php echo pathPhp(); ?>traitement_supprimer.php">
                                    <td class="supprimer"><button class="suppr" type="submit" value="<?php echo $Art['id']; ?>" name="supprimer">Supprimer</button></td>
                                </form>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>


            <div class="containerPrivateVisite" id="partie3">
                <div class="separationArticle">
                    <div class="titrePrivate">DATES VISITE</div>
                </div>
                <div class="blocAjoutervisite">
                    <form class="formulaireAjouterVisite" action="..\<?php echo pathPhp(); ?>traitement_ajoutVisite.php" method="POST">
                        <div class="blocAjoutVisiteGabarit">
                            <label class="TitreVisite">Calendrier</label>
                            <input class="AjoutVisite" type="date" id="date" name="date" value="2022-01-01" min="2000-01-01" max="2158-12-31">
                        </div>
                        <div class="blocAjoutVisiteGabarit">
                            <label class="TitreVisite">Heure</label>
                            <input class="AjoutVisite" type="texte" id="heure" name="heure" placeholder="10h00">
                        </div>
                        <div class="blocBoutonVisite">
                            <input type="submit" class="boutonVisite" value=" Valider">
                        </div>
                    </form>

                </div>
            </div>

            <div class="containerPrivateVisite" id="partie4">
                <div class="separationArticle">
                    <div class="titrePrivate">LISTE VISITES</div>
                </div>
                <div class="blocAffichageVisite">
                    <table class=" listeAffciahge">
                        <tr>
                            <th class="AffListe">Date</th>
                            <th class="AffListe">Heure</th>
                            <th class="AffListe">Supprimer</th>
                            <th class="AffListe">Complet</th>
                            <th class="AffListe">Place Disponible</th>
                        </tr>

                        <?php
                        //liste des articles
                        $visite = $bdd->prepare('SELECT * FROM visite_date');
                        $visite->execute(array());
                        while ($AffichageVisite = $visite->fetch()) {

                        ?>
                            <tr>
                                <td class="AffListeTD"><?php echo $AffichageVisite['temps']; ?></td>
                                <td class="AffListeTD"><?php echo $AffichageVisite['heure']; ?></td>
                                <form method="POST" action="..\<?php echo pathPhp(); ?>traitement_supprimerVisite.php">
                                    <td class="AffListeTD"><button class="boutonSupprAff" type="submit" value="<?php echo $AffichageVisite['id']; ?>" name="supprimer">Supprimer</button></td>
                                </form>
                                <?php
                                if ($AffichageVisite['full'] == 0) {
                                ?>
                                    <form method="POST" action="..\<?php echo pathPhp(); ?>traitement_completVisite.php">
                                        <td class="AffListeTD"><button class="boutonFull" type="submit" value="<?php echo $AffichageVisite['id']; ?>" name="complet">Complet</button></td>
                                    </form>
                                <?php
                                } else { ?>
                                    <td class="AffListeTD">Date complète</td>
                                <?php
                                }
                                ?>
                                <?php
                                if ($AffichageVisite['full'] == 1) {
                                ?>
                                    <form method="POST" action="..\<?php echo pathPhp(); ?>traitement_disponibleVisite.php">
                                        <td class="AffListeTD"><button class="boutonUp" type="submit" value="<?php echo $AffichageVisite['id']; ?>" name="disponible">Disponible</button></td>
                                    </form>
                                <?php
                                } else { ?>
                                    <td class="AffListeTD">Date disponible</td>
                                <?php
                                }
                                ?>
                            </tr>
                        <?php
                        }
                        ?>

                    </table>
                </div>
            </div>
        </section>



        <script src="app.js"></script>
        </body>

        </html>
<?php
    } else {
        header("location:accueil.php");
    }
} else {
    header("location:accueil.php");
}
?>