<?php

declare(strict_types=1);

namespace Xvilo\HackerNews;

use Xvilo\HackerNews\HttpClient\HttpClientBuilder;

class Client
{
    private HttpClientBuilder $httpClientBuilder;

    public function __construct(HttpClientBuilder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new HttpClientBuilder();
    }
}
