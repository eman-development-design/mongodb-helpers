<?php

$finder = (new PhpCsFixer\Finder())
    ->in(__DIR__);

return (new PhpCsFixer\Config())
    ->setRules([
        'global_namespace_import' => [
            'import_classes' => true,
            'import_constants' => true,
            'import_functions' => true,
        ],
        'no_superfluous_phpdoc_tags' => false,
        'trailing_comma_in_multiline' => false,
        'yoda_style' => false
    ])
    ->setFinder($finder);
