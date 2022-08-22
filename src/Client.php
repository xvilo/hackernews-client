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
use Http\Client\Common\Plugin\AddHostPlugin;
use Http\Client\Common\Plugin\AddPathPlugin;
use Http\Client\Common\Plugin\RedirectPlugin;
use Http\Discovery\Psr17FactoryDiscovery;
use Xvilo\HackerNews\Api\FrontPage;
use Xvilo\HackerNews\Api\Item;
use Xvilo\HackerNews\Api\MetaData;
use Xvilo\HackerNews\Api\Users;
use Xvilo\HackerNews\HttpClient\HttpClientBuilder;

class Client
{
    private readonly HttpClientBuilder $httpClientBuilder;

    private readonly Item $item;
    private readonly Users $user;
    private readonly FrontPage $frontPage;
    private readonly MetaData $metaData;

    public function __construct(
        HttpClientBuilder $httpClientBuilder = null
    ) {
        $this->httpClientBuilder = $httpClientBuilder ?: new HttpClientBuilder();

        $this->setupHttpBuilder();

        // Setup api
        $this->item = new Item($this);
        $this->user = new Users($this);
        $this->frontPage = new FrontPage($this);
        $this->metaData = new MetaData($this);
    }

    public function getHttpClient(): HttpMethodsClient
    {
        return $this->getHttpClientBuilder()->getHttpClient();
    }

    public function item(): Item
    {
        return $this->item;
    }

    public function user(): Users
    {
        return $this->user;
    }

    public function frontPage(): FrontPage
    {
        return $this->frontPage;
    }

    public function metaData(): MetaData
    {
        return $this->metaData;
    }

    protected function getHttpClientBuilder(): HttpClientBuilder
    {
        return $this->httpClientBuilder;
    }

    private function setupHttpBuilder(): void
    {
        $uri = 'https://hacker-news.firebaseio.com/v0/';
        $this->httpClientBuilder->addPlugin(new RedirectPlugin());
        $this->httpClientBuilder->addPlugin(
            new AddHostPlugin(Psr17FactoryDiscovery::findUriFactory()
                ->createUri($uri))
        );
        $this->httpClientBuilder->addPlugin(
            new AddPathPlugin(Psr17FactoryDiscovery::findUriFactory()
                ->createUri($uri))
        );
    }
}
