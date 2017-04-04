<?php
require "vendor/autoload.php";
require_once 'config.php';

use Abraham\TwitterOAuth\TwitterOAuth;



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