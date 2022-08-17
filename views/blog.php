<?php

require_once "header.php";

//Requete test


?>

<section class="blog">
    <div class="containerBlog">
        <div class="vide"></div>
        <div class="containerBlogTitre">
            <div class="blogTitre">En Savoir Plus</div>
        </div>
        <div class="containerGabarit">
            <?php

            $T = $bdd->prepare('SELECT * FROM article');
            $T->execute(array());
            while ($Te = $T->fetch()) {
            ?>
                <div class="article">
                    <div class="containerTitreArticle">
                        <div class="TitreArticle"><?php echo $Te['titre']; ?></div>
                    </div>
                    <?php
                    if (!empty($Te['description'])) {
                    ?>
                        <div class="containerArticle">
                            <div class="contenuArticle">
                                <p class="articleDescription"><?php echo substr($Te['description'], 0, 500); ?></p>
                            </div>
                        </div>
                    <?php
                    } else {
                    ?> <div class="containerArticle">
                            <div class="contenuArticleImage">
                                <img class="articleImage" src="<?php echo pathImg();
                                                                echo $Te['image']; ?>"></img>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                    <div class="containerBoutonArticle">
                        <div class="boutonArticle">
                            <a href="details.php?id=<?php echo $Te['id']; ?>" class="buttonArt">Lire</a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>
        </div>
    </div>

</section>
<div class="footer"></div>
<script src="app.js"></script>
</body>

</html>