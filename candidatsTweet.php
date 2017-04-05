<?php
require "vendor/autoload.php";
require_once 'config.php';

use Abraham\TwitterOAuth\TwitterOAuth;



// Création des fonction de récupération des valeurs par account et par hashtag

define('CONSUMER_KEY', TWITTER_KEY);
define('CONSUMER_SECRET', TWITTER_SECRET);
define('ACCESS_TOKEN', TWITTER_ACCESS_TOKEN);
define('ACCESS_TOKEN_SECRET', TWITTER_TOKEN_SECRET);

function search(array $query)
{
    $toa = new TwitterOAuth(TWITTER_KEY, TWITTER_SECRET, TWITTER_ACCESS_TOKEN, TWITTER_TOKEN_SECRET);
    return $toa->get('search/tweets', $query);
}

$client = new MongoDB\Client("mongodb://localhost:27017");
$tweetCandidats = $client->twitterKing->tweetCandidats;
$allResult = array();
foreach ($candidats as $candidat)
{
    $query = array(
        'q' => 'from:'.$candidat[1],
        'count' => 100,
    );

    $lastId = '';
    for ($i = 0; $i < 15; $i++)
    {
        if ($i > 0) {
            $query['max_id'] = $lastId;
        }

        $results = search($query);
        if (count($results) == 0) {
            break;
        }
        $cptResults = 0;
        foreach ($results->statuses as $result)
        {
            $dateCreation = new DateTime($result->created_at);
            $candidatT = array(
                'tweetId' => $result->id_str,
                'user'=>$result->user->screen_name,
                'date'=> $dateCreation->format('Y-m-d\TH:i:s.000\Z'),
                'content'=>$result->text,
                'retweet'=>$result->retweet_count,
            );
            $allResult[] = $candidatT;

            $cptResults++;
            if ($cptResults == 99) {
                $lastId = $result->id_str;
            }
        }
    }
}
$tweetCandidats->insertMany($allResult);

