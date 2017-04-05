<?php
require 'vendor/autoload.php';

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

function getCandidatNbRetweets($screenName)
{
    //retweet by candidat
    //db.tweetCandidats.aggregate([{$match:{'user': 'n_arthaud'}},{$group:{_id:"$user",retweet:{$sum:"$retweet"}}}])

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $candidatsSchema = $client->twitterKing->tweetCandidats;

    $result = $candidatsSchema->aggregate(
        [
            array(
                '$match' => array(
                    'user' => $screenName
                )
            ),
        array(
            '$group' => array(
                '_id' => '$user',
                'retweet' => array(
                    '$sum' => '$retweet'
                )
            )
        )
        ]);

    return $result->toArray()[0];
}

function getNbWordUsed($screenName,$word)
{
    //db.tweetCandidats.find({$and:[{"user":'JLMelenchon'},{"content":{$regex:'nous', $options : 'i'}}]}).count()

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $candidatsSchema = $client->twitterKing->tweetCandidats;

    $results = $candidatsSchema->find(array(
        '$and' => array(
            array(
                "user" => $screenName
            ),
            array(
                "content" => array(
                    '$regex' => $word,
                    '$options' => "i"
                )
            )
        )
    ));

    return count($results->toArray());
}

function getNbTweetPerDay($screenName,$day)
{
    //2017-04-05
    //db.tweetCandidats.find({$and:[{"user":'JLMelenchon'},{"date":{$regex:'Mon', $options : 'i'}}]}).count()

    $client = new MongoDB\Client("mongodb://localhost:27017");
    $candidatsSchema = $client->twitterKing->tweetCandidats;

    $results = $candidatsSchema->find(array(
        '$and' => array(
            array(
                "user" => $screenName
            ),
            array(
                "date" => array(
                    '$regex' => $day
                )
            )
        )
    ));

    return count($results->toArray());
}