<?php

use Rector\CodeQuality\Rector\Identical\SimplifyBoolIdenticalTrueRector;
use Rector\Config\RectorConfig;
use Rector\PHPUnit\CodeQuality\Rector\Class_\PreferPHPUnitThisCallRector;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/src/',
        __DIR__ . '/tests/',
    ])
    ->withPhpSets(
        php84: true
    )
    ->withPreparedSets(
        deadCode: true,
        codeQuality: true,
        codingStyle: true,
        typeDeclarations: true,
        privatization: true,
        instanceOf: true,
        earlyReturn: true,
        strictBooleans: true,
        phpunitCodeQuality: true,
    )
    ->withSkip([
        SimplifyBoolIdenticalTrueRector::class,
        PreferPHPUnitThisCallRector::class,
    ]);
