<?php
//require __DIR__ . '/vendor/autoload.php';
//use Phpfastcache\Helper\Psr16Adapter;

require_once('Balance.php');

$b = new Balance('ariclinis','pass');

echo $b->getUserFollowers();
/*
$instagram = \InstagramScraper\Instagram::withCredentials('ariclinis', '934641870@riclinis1998', new Psr16Adapter('Files'));

$instagram->login();

$username = 'ariclinis';
$followers = [];
$account = $instagram->getAccount($username);
$followers = $instagram->getFollowers($account->getId(), 200, 200, true); // Get 1000 followers of 'kevin', 100 a time with random delay between requests
echo '<pre>' . json_encode($followers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</pre>';
*/
/*
foreach ($followers as $value) {

   echo $value['username']."</br>"; 

}*/
