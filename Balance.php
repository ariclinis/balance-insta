<?php 
require __DIR__ . '/vendor/autoload.php';
use Phpfastcache\Helper\Psr16Adapter;
use Goutte\Client;

class Balance{

    private $instagram;
    private $username;
    private $password;
    

    function __construct($username, $password){
        $this->username = $username;
        $this->password = $password;
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

    public function getUnfollow(){

        ///section/main/div/header/section/div[1]/div[2]/span/span[1]/button
        //'/html/body/div[4]/div/div/div[3]/button[1]'

        $client = new Client();
        
        $crawler = $client->request('GET', 'https://www.instagram.com/accounts/login/?force_classic_login');
        
        $form = $crawler->selectButton('Log in')->form();
        #$form = $crawler->filterXPath('//body/*')->extract(['L3NKy']);
        
        $form['username'] = $this->username;
        $form['enc_password'] = $this->password;
        $crawler = $client->submit($form);
        $crawler->filter('body')->each(function ($node) {
            print $node->text()."\n";
        });
    }
}