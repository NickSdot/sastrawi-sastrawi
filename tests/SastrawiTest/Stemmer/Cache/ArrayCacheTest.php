<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer\Cache;

final class ArrayCacheTest extends \PHPUnit\Framework\TestCase
{
    private \Sastrawi\Stemmer\Cache\ArrayCache $arrayCache;

    protected function setUp(): void
    {
        $this->arrayCache = new \Sastrawi\Stemmer\Cache\ArrayCache();
    }

    public function testInstanceOfCacheInterface(): void
    {
        self::assertInstanceOf(\Sastrawi\Stemmer\Cache\CacheInterface::class, $this->arrayCache);
    }

    public function testSetGetHas(): void
    {
        self::assertFalse($this->arrayCache->has('abc'));
        self::assertNull($this->arrayCache->get('abc'));

        $this->arrayCache->set('abc', 123);
        self::assertTrue($this->arrayCache->has('abc'));
        self::assertEquals(123, $this->arrayCache->get('abc'));
    }
}
