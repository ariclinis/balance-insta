<?php 

use EspressoDev\InstagramBasicDisplay\InstagramBasicDisplay;

$instagram = new InstagramBasicDisplay([
    'appId' => '293188695279237',
    'appSecret' => '62fee2339c8257902381ee10ba93c7fb',
    'redirectUri' => 'https://balance-insta.herokuapp.com/'
]);

echo "<a href='{$instagram->getLoginUrl()}'>Login with Instagram</a>";
