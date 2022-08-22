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

final class FrontPage extends AbstractApi
{
    public function getTopStories(): array
    {
        return $this->get('/topstories');
    }

    public function getNewStories(): array
    {
        return $this->get('/newstories');
    }

    public function getBestStories(): array
    {
        return $this->get('/beststories');
    }

    public function getAskStories(): array
    {
        return $this->get('/askstories');
    }

    public function getShowStories(): array
    {
        return $this->get('/showstories');
    }

    public function getJobStories(): array
    {
        return $this->get('/jobstories');
    }
}
