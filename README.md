# HackerNews Client (PHP)

A HackerNews API Wrapper, it's based on the official Firebase API provided at [HackerNews/api](https://github.com/hackernews/api).
In its current form, it supports all endpoints with basic calls, this will be expanded in the future.

### Installation
You can install this package through composer, the easiest way is to:

```sh
composer require xvilo/hackernews-client
```

[You will also need an implementation of `php-http/client-implementation`.](#php-httpclient-implementation-needed)

## Usage

```php
<?php
declare(strict_types=1);   

// This file is generated by Composer
require_once __DIR__ . '/vendor/autoload.php';

// Create Client Instance
$client = new \Xvilo\HackerNews\Client();

// Call endpoint
var_dump(
    $client->item()->getItem(8863)
);

//array(9) {
//    'by' =>
//    string(8) "dhouston"
//    'descendants' =>
//    int(71)
//    'id' =>
//    int(8863)
//    [...]

```

## FAQ

### php-http/client-implementation needed
If you try to install this package and get the following error:
```
xvilo/hackernews-client 1.0.0 requires php-http/client-implementation ^1.0 -> no matching package found
```

Please install a PHP HTTP library such as *Guzzle* or *Symfony HttpClient Component*:

```sh
composer require symfony/http-client
```

or

```sh
composer require php-http/guzzle6-adapter
```
