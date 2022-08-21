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

use Http\Discovery\Psr17FactoryDiscovery;
use Xvilo\HackerNews\HttpClient\HttpClientBuilder;
use Http\Client\Common\Plugin;

class Client
{
    private HttpClientBuilder $httpClientBuilder;

    public function __construct(HttpClientBuilder $httpClientBuilder = null)
    {
        $this->httpClientBuilder = $httpClientBuilder ?: new HttpClientBuilder();

        $this->setupHttpBuilder();
    }

    private function setupHttpBuilder(): void
    {
        $this->httpClientBuilder->addPlugin(new Plugin\RedirectPlugin());
        $this->httpClientBuilder->addPlugin(
            new Plugin\AddHostPlugin(Psr17FactoryDiscovery::findUriFactory()
                ->createUri('https://hacker-news.firebaseio.com/v0/'))
        );
    }

    protected function getHttpClientBuilder(): HttpClientBuilder
    {
        return $this->httpClientBuilder;
    }
}
