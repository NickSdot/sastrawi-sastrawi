<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\CachedStemmer;
use Sastrawi\Stemmer\Cache\ArrayCache;
use Sastrawi\Stemmer\Stemmer;
use Sastrawi\Dictionary\ArrayDictionary;

final class CachedStemmerTest extends \PHPUnit\Framework\TestCase
{
    public $arrayCache;

    private \Sastrawi\Stemmer\CachedStemmer $cachedStemmer;

    protected function setUp(): void
    {
        $arrayDictionary = new ArrayDictionary(['makan']);
        $delegatedStemmer = new Stemmer($arrayDictionary);
        $this->arrayCache    = new ArrayCache();
        $this->cachedStemmer = new CachedStemmer($this->arrayCache, $delegatedStemmer);
    }

    public function testInstanceOfStemmerInterface(): void
    {
        self::assertInstanceOf(\Sastrawi\Stemmer\StemmerInterface::class, $this->cachedStemmer);
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
        self::assertEquals('makan', $this->cachedStemmer->getCache()->get('memakan'));
        self::assertEquals('makan', $this->cachedStemmer->getCache()->get('makanan'));
    }
}
