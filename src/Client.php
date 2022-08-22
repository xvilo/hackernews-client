<?php

declare(strict_types=1);

/*
 * This file is part of the xvilo/hackernews-client package.
 * (c) Sem Schilder <sem@tropical.email>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Xvilo\HackerNews;

use Http\Client\Common\HttpMethodsClient;
use Http\Client\Common\Plugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Xvilo\HackerNews\HttpClient\HttpClientBuilder;

class Client
{
    private HttpClientBuilder $httpClientBuilder;

    private Api\Item $item;
    private Api\Users $user;
    private Api\FrontPage $frontPage;

    public function __construct(HttpClientBuilder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new HttpClientBuilder();

        $this->setupHttpBuilder();

        // Setup api
        $this->item = new Api\Item($this);
        $this->user = new Api\Users($this);
        $this->frontPage = new Api\FrontPage($this);
    }

    public function getHttpClient(): HttpMethodsClient
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    public function item(): Api\Item
    {
        return $this->item;
    }

    public function user(): Api\Users
    {
        return $this->user;
    }

    public function frontPage(): Api\FrontPage
    {
        return $this->frontPage;
    }

    protected function getHttpClientBuilder(): HttpClientBuilder
    {
        return $this->httpClientBuilder;
    }

    private function setupHttpBuilder(): void
    {
        $uri = 'https://hacker-news.firebaseio.com/v0/';
        $this->httpClientBuilder->addPlugin(new Plugin\RedirectPlugin());
        $this->httpClientBuilder->addPlugin(
            new Plugin\AddHostPlugin(Psr17FactoryDiscovery::findUriFactory()
                ->createUri($uri))
        );
        $this->httpClientBuilder->addPlugin(
            new Plugin\AddPathPlugin(Psr17FactoryDiscovery::findUriFactory()
                ->createUri($uri))
        );
    }
}
