<?php

declare(strict_types=1);

/*
 * This file is part of the xvilo/hackernews-client package.
 * (c) Sem Schilder <sem@tropical.email>
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

$header = <<<'EOF'
    This file is part of the xvilo/hackernews-client package.
    (c) Sem Schilder <sem@tropical.email>

    This source file is subject to the MIT license that is bundled
    with this source code in the file LICENSE.
    EOF;

$finder = PhpCsFixer\Finder::create()
    ->ignoreDotFiles(false)
    ->ignoreVCSIgnored(true)
    ->in(__DIR__)
    ->append([
        __DIR__.'/src',
    ])
;

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)
    ->setRules([
        '@PHP74Migration' => true,
        '@PHP74Migration:risky' => true,
        '@PHPUnit75Migration:risky' => true,
        '@PhpCsFixer' => true,
        '@PhpCsFixer:risky' => true,
        'general_phpdoc_annotation_remove' => ['annotations' => ['expectedDeprecation']], // one should use PHPUnit built-in method instead
        'header_comment' => ['header' => $header],
        'heredoc_indentation' => false, // TODO switch on when # of PR's is lower
        'modernize_strpos' => true, // needs PHP 8+ or polyfill
        'use_arrow_functions' => false, // TODO switch on when # of PR's is lower
    ])
    ->setFinder($finder)
;
