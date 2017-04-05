<?php

require 'vendor/autoload.php';
require_once 'config.php';

use Abraham\TwitterOAuth\TwitterOAuth;

global $candidats;

$toa = new TwitterOAuth(TWITTER_KEY, TWITTER_SECRET, TWITTER_ACCESS_TOKEN, TWITTER_TOKEN_SECRET);

$client = new MongoDB\Client("mongodb://localhost:27017");
$candidatsSchema = $client->twitterKing->candidats;

foreach ($candidats as $candidat)
{
    $parameters = array(
        "screen_name" => $candidat[1]
    );

    $result = $toa->get('users/show',$parameters);

    $candidatF = array(
        "twitter_id" => $result->id,
        "name" => $result->name,
        "screen_name" => $result->screen_name,
        "description" => $result->description,
        "followers" => $result->followers_count,
        "tweets_count" => $result->statuses_count,
        "inscription_date" => $result->created_at
    );

    $candidatsSchema->insertOne($candidatF);
}

echo 'coucou';
