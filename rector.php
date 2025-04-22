<?php

use Rector\Config\RectorConfig;
use Rector\PHPUnit\Set\PHPUnitSetList;

return RectorConfig::configure()
    ->withSets([
        PHPUnitSetList::PHPUNIT_40,
    ]);
