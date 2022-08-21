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

final class Users extends AbstractApi
{
    public function getUser(string $username): array
    {
        return $this->get(sprintf('/user/%s', $username));
    }
}
