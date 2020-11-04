# Balance
The idea is create a simple Web Scraping for I can Unfollow the people that don't follow me in Instagram

## Dependencies

- [PSR-16](http://www.php-fig.org/psr/psr-16/)



Using proxy for requests:

```php
$instagram = new \InstagramScraper\Instagram();
Instagram::setProxy([
    'address' => '111.112.113.114',
    'port'    => '8080',
    'tunnel'  => true,
    'timeout' => 30,
]);
// Request with proxy
$account = $instagram->getAccount('kevin');
Instagram::disableProxy();
// Request without proxy
$account = $instagram->getAccount('kevin');
```

## Installation

### Using composer

```sh
composer.phar require raiym/instagram-php-scraper
```
or 
```sh
composer require raiym/instagram-php-scraper
```

### If you don't have composer
You can download it [here](https://getcomposer.org/download/).

## Credit
[instagram-php-scraper](https://github.com/mzaharov/instagram-php-scraper).

## Other
Java library: https://github.com/postaddictme/instagram-java-scraper
