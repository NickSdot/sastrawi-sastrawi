<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Dictionary\ArrayDictionary;
use Sastrawi\Stemmer\Cache\ArrayCache;
use Sastrawi\Stemmer\CachedStemmer;
use Sastrawi\Stemmer\Stemmer;
use Sastrawi\Stemmer\StemmerInterface;

final class CachedStemmerTest extends TestCase
{
    public ArrayCache $arrayCache;

    private CachedStemmer $cachedStemmer;

    protected function setUp(): void
    {
        $arrayDictionary = new ArrayDictionary(['makan']);
        $delegatedStemmer = new Stemmer($arrayDictionary);
        $this->arrayCache    = new ArrayCache();
        $this->cachedStemmer = new CachedStemmer($this->arrayCache, $delegatedStemmer);
    }

    public function testInstanceOfStemmerInterface(): void
    {
        self::assertInstanceOf(StemmerInterface::class, $this->cachedStemmer);
    }

    public function testGetCache(): void
    {
        self::assertSame($this->arrayCache, $this->cachedStemmer->getCache());
    }

    public function testStemLookupTheCache(): void
    {
        self::assertSame('makan makan', $this->cachedStemmer->stem('memakan makanan'));
        $this->cachedStemmer->getCache()->set('memakan', 'minum');
        self::assertSame('minum makan', $this->cachedStemmer->stem('memakan makanan'));
    }

    public function testStemStoreResultToCache(): void
    {
        self::assertSame('makan makan', $this->cachedStemmer->stem('memakan makanan'));
        self::assertSame('makan', $this->cachedStemmer->getCache()->get('memakan'));
        self::assertSame('makan', $this->cachedStemmer->getCache()->get('makanan'));
    }
}
