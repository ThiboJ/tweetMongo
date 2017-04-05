<?php
require_once ("config.php");
require_once ("functions.php");
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>Les elections sur Twitter</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="script.js"></script>  <script src="https://cdn.anychart.com/js/7.13.0/anychart-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdn.anychart.com/css/7.13.0/anychart-ui.min.css" />
    <style>
        html, body, #container {
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>
<div id="header">
    <div class="parts-large">
        Big Data
        <br/>
        MongoDB
    </div>
    <div class="parts-small">
        <img src="img/icones/twitter.png" alt="">
    </div>
    <div class="parts-large">
        GOURIER Sylvain
        <br/>
        HIL Benjamin
        <br/>
        JULLION Thibault
    </div>
</div>
<div id="container-candidats">
    <?php foreach ($candidats as $candidat):?>
        <?php $account = $candidat[1]; ?>
        <?php $name = $candidat[0]; ?>
        <?php $infos = getCandidatInfo($account); ?>
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
                <div class="number">
                    <?php echo $infos['followers']; ?>
                </div>
                <div class="label">
                    Followers
                </div>
                <div class="number">
                    <?php echo $infos['tweets_count']; ?>
                </div>
                <div class="label">
                    Tweets
                </div>
            </div>
        </div>
    <?php endforeach;?>
</div>

<!--            PIES            -->
<div id="pie-charts">
    <div class="pies" id="pie-tweet"></div>
    <div class="pies" id="pie-followers"></div>
</div>
<?php require_once ("parts/pies/tweets.php"); ?>
<?php require_once ("parts/pies/followers.php"); ?>


<!--            BARS            -->
<div id="bars-hashtag">
</div>
<?php require_once ("parts/bars/hashtag.php"); ?>




</body>
</html>

<?php $m = new Mongo('localhost'); ?>


