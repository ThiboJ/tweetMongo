<?php
require "vendor/autoload.php";
require_once 'config.php';

use Abraham\TwitterOAuth\TwitterOAuth;


// array(NOM_CANDIDAT,TWITTER,MOTS_CLEFS)
array(
    array("Nathalie Arthaud","n_arthaud",array("NathalieArthaud","arthaud")),
    array("Jean Luc Melenchon","JLMelenchon",array("JeanLucMelenchon","JLM")),
    array("Benoît Hamon","benoithamon",array("BenoitHamon","hamon")),
    array("Nicolas Dupont Aignan","dupontaignan",array("NicolasDupontAignan","duponaignan")),
    array("Jean Lassalle","jeanlassalle",array("JeanLassalle","lasalle")),
    array("Emmanuel Macron","EmmanuelMacron",array("EmmanuelMacron","macron")),
    array("Marine Le Pen","MLP_officiel",array("MarineLePen","MLP")),
    array("Philippe Poutou","PhilippePoutou",array("PhilippePoutou","poutou")),
    array("Jacques Cheminad","Chaminade_HS",array("JacquesCheminad","cheminad")),
    array("François Asselineau","UPR_Asselineau",array("FrançoisAsselineau","asselineau")),
    array("François Fillon","FrancoisFillon",array("FrançoisFillon","fillon"))
);



// Création des fonction de récupération des valeurs par account et par hashtag

define('CONSUMER_KEY', TWITTER_KEY);
define('CONSUMER_SECRET', TWITTER_SECRET);
define('ACCESS_TOKEN', 'your_access_token');
define('ACCESS_TOKEN_SECRET', 'your_access_token_secret');

function search(array $query)
{
    $toa = new TwitterOAuth(TWITTER_KEY, TWITTER_SECRET, TWITTER_ACCESS_TOKEN, TWITTER_TOKEN_SECRET);
    return $toa->get('search/tweets', $query);
}

$query = array(
    "q" => "",
);

$results = search($query);

foreach ($results->statuses as $result) {
    echo $result->user->screen_name . ": " . $result->text . "\n";
}

?>