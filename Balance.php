<?php 
require __DIR__ . '/vendor/autoload.php';
use Phpfastcache\Helper\Psr16Adapter;

class Balance{

    private $instagram;
    private $username;

    public function Balance($username, $password){
        $this->username = $username;
        $this->instagram = \InstagramScraper\Instagram::withCredentials($username, $password, new Psr16Adapter('Files'));
        $this->instagram->login();
    }

    public function getUserFollowers(){
        $followers = [];
        $account = $this->instagram->getAccount($this->username);
        $followers = $this->instagram->getFollowers($account->getId(), 200, 200, true); // Get 1000 followers of 'kevin', 100 a time with random delay between requests
        echo '<pre>' . json_encode($followers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</pre>';
    }

    public function getUsersFollowing(){
        $followers = [];
        $account = $this->instagram->getAccount($this->username);
        $followers = $this->instagram->getFollowing($account->getId(), 200, 200, true); // Get 1000 followings of 'kevin', 100 a time with random delay between requests
        echo '<pre>' . json_encode($followers, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES) . '</pre>';
    }

}