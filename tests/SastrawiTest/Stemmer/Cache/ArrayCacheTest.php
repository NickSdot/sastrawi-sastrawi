<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer\Cache;

use PHPUnit\Framework\TestCase;
use Sastrawi\Stemmer\Cache\ArrayCache;
use Sastrawi\Stemmer\Cache\CacheInterface;

final class ArrayCacheTest extends TestCase
{
    private ArrayCache $arrayCache;

    protected function setUp(): void
    {
        $this->arrayCache = new ArrayCache();
    }

    public function testInstanceOfCacheInterface(): void
    {
        self::assertInstanceOf(CacheInterface::class, $this->arrayCache);
    }

    public function testSetGetHas(): void
    {
        self::assertFalse($this->arrayCache->has('abc'));
        self::assertNull($this->arrayCache->get('abc'));

        $this->arrayCache->set('abc', 'foo');
        self::assertTrue($this->arrayCache->has('abc'));
        self::assertEquals('foo', $this->arrayCache->get('abc'));
    }
}
