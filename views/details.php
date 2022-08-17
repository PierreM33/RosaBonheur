<?php

require_once "../include/connexion_bdd.php";
require_once "style.php";


$getArticle = strip_tags(htmlspecialchars($_GET['id']));

//REQUETE
$Req = $bdd->prepare('SELECT * FROM article WHERE id=?');
$Req->execute(array($getArticle));
$R = $Req->fetch();

$titre = $R['titre'];
$description = $R['description'];
$image = $R['image'];

$Reqe = $bdd->prepare('SELECT max(Id) FROM article ');
$Reqe->execute(array());
$Max = $Reqe->fetch();

if (is_numeric($getArticle) and $getArticle >= 1 and $getArticle <= $Max['0']) {
?>






    <section class="getBlog">
        <div class="containerGetBlog">
            <div class="blocTitreGet">
                <div class="TitreGet"><?php echo $titre; ?></div>
            </div>
            <div class="blocContenueGet">

                <?php

                if (!empty($image)) {
                ?>
                    <div class="blocImageGet">
                        <div class="blocImageGetPosition">
                            <img class="imageGet" alt="" src="<?php echo pathImg();
                                                                echo $image; ?>">

                        </div>
                    </div>
                <?php
                }

                //si la description n'est pas vide
                if (!empty($description)) {
                ?>
                    <div class="blocInfoGet">
                        <div class="cadreInfoGet">
                            <p class="InfoGet"><?php echo $description; ?></p>
                        </div>
                    </div>
                <?php
                }
                ?>


            </div>
            <div class="blocRetour">
                <a href="blog.php" class="buttonRetour">Retour</a>
            </div>
        </div>

    </section>
    <script src="app.js"></script>
    </body>

    </html>

<?php

} else {
    header('Location:404.php');

    exit();
}

?>