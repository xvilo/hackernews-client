<?php

declare(strict_types=1);

/*
 * This file is part of the xvilo/hackernews-client package.
 * (c) Sem Schilder <sem@tropical.email>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Xvilo\HackerNews\Api;

use Http\Client\Exception;
use Xvilo\HackerNews\Client;

abstract class AbstractApi
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @param array<string, string> $parameters
     * @param array<string, string> $requestHeaders
     *
     * @throws Exception
     *
     * @return array
     */
    protected function get(string $path, array $parameters = [], array $requestHeaders = [])
    {
        if (\count($parameters) > 0) {
            $path .= '?'.http_build_query($parameters);
        }

        $response = $this->client->getHttpClient()->get($path.'.json', $requestHeaders);

        return (array)json_decode((string) $response->getBody(), true);
    }
}
