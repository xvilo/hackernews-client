<?php

declare(strict_types=1);

/*
 * This file is part of the xvilo/hackernews-client package.
 * (c) Sem Schilder <sem@tropical.email>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use Rector\Config\RectorConfig;
use Rector\Core\ValueObject\PhpVersion;
use Rector\Set\ValueObject\LevelSetList;

return static function (RectorConfig $rector): void {
    $rector->import(LevelSetList::UP_TO_PHP_81);

    // register single rule
    $services = $rector->services();
    $services->set(NoUnusedImportsFixer::class);

    $rector->parallel();
    $rector->importNames();
    $rector->phpVersion(PhpVersion::PHP_81);
    $rector->paths([
        __DIR__.'/src',
    ]);
};
