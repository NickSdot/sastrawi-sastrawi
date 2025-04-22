<?php

use Rector\Config\RectorConfig;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src/**',
        __DIR__ . '/tests/**',
    ])
    ->withPhpSets(php84: true)
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true,
        rectorPreset: true,
        phpunitCodeQuality: true,
    )
    //->withRules([
    //    AddTestsVoidReturnTypeWhereNoReturnRector::class,
    //])
    ;
