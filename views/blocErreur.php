<div class="blocErreur">
    <?php
    if (!empty($_SESSION['error'])) {
        $messageErreur = $_SESSION['error'];
        echo $messageErreur;
    }

    ?>
</div>