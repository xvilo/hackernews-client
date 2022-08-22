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

final class MetaData extends AbstractApi
{
    public function getMaxItem(): int
    {
        return (int) $this->get('/maxitem');
    }

    public function getUpdates(): array
    {
        return $this->get('/updates');
    }
}
