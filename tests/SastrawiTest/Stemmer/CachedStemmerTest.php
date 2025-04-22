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

    public function setUp(): void
    {
        $arrayDictionary = new ArrayDictionary(['makan']);
        $delegatedStemmer = new Stemmer($arrayDictionary);
        $this->arrayCache    = new ArrayCache();
        $this->cachedStemmer = new CachedStemmer($this->arrayCache, $delegatedStemmer);
    }

    public function testInstanceOfStemmerInterface(): void
    {
        $this->assertInstanceOf(\Sastrawi\Stemmer\StemmerInterface::class, $this->cachedStemmer);
    }

    public function testGetCache(): void
    {
        $this->assertSame($this->arrayCache, $this->cachedStemmer->getCache());
    }

    public function testStemLookupTheCache(): void
    {
        $this->assertEquals('makan makan', $this->cachedStemmer->stem('memakan makanan'));
        $this->cachedStemmer->getCache()->set('memakan', 'minum');
        $this->assertEquals('minum makan', $this->cachedStemmer->stem('memakan makanan'));
    }

    public function testStemStoreResultToCache(): void
    {
        $this->assertEquals('makan makan', $this->cachedStemmer->stem('memakan makanan'));
        $this->assertEquals('makan', $this->cachedStemmer->getCache()->get('memakan'));
        $this->assertEquals('makan', $this->cachedStemmer->getCache()->get('makanan'));
    }
}
