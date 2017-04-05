<?php
require 'vendor/autoload.php';

//retweet by candidat
//db.tweetCandidats.aggregate([{$match:{'user': 'n_arthaud'}},{$group:{_id:"$user",retweet:{$sum:"$retweet"}}}])

function getCandidatInfo($screenName)
{
    $client = new MongoDB\Client("mongodb://localhost:27017");
    $candidatsSchema = $client->twitterKing->candidats;
    $cursor = $candidatsSchema->find(['screen_name' => $screenName]);

    return $cursor->toArray()[0];
}

function getCandidatNbTweet($screenName)
{
    $infos = getCandidatInfo($screenName);

    return $infos['tweets_count'];
}

function getCandidatNbFollowers($screenName)
{
    $infos = getCandidatInfo($screenName);

    return $infos['followers'];
}
