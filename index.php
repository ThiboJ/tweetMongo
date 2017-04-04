<?php
require_once ("config.php");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Titre de la page</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>
</head>
<body>

<div id="container-candidats">
    <?php foreach ($candidats as $candidat):?>
        <?php $account = $candidat[1]; ?>
        <?php $name = $candidat[0]; ?>
        <div class="candidat">
            <div class="inner">
                <img class="image" src="img/candidats/<?php echo $account ?>.jpg" alt="">
                <div class="name">
                    <?php echo $name ?>
                </div>
                <img src="img/icones/twitter.png" class="icon-twitter" alt="">
                <a class="twitter" target="_blank" href="http://twitter.com/<?php echo $account ?>">
                    @<?php echo $account ?>
                </a>
            </div>
        </div>
    <?php endforeach;?>
</div>

</body>
</html>




<?php


echo "Affichage des valeurs";

// Affichage du nombre de tweet par candidat depuis un mois
// Affichage du nombre de tweet par candidat avec les hashtags
// Affichage nombre de tweet pour "presidentielle2017"
// Difference des folowwers

//BONUS : Tweet de TRUMP

?>