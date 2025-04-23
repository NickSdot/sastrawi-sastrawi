<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Dictionary\ArrayDictionary;
use Sastrawi\Stemmer\Stemmer;
use Sastrawi\Stemmer\StemmerInterface;

final class StemmerTest extends TestCase
{
    private \Sastrawi\Stemmer\Stemmer $stemmer;

    protected function setUp(): void
    {
        $dictionary = new ArrayDictionary(['beri']);
        $this->stemmer = new Stemmer($dictionary);
    }

    public function testStemmerImplementsStemmerInterface(): void
    {
        self::assertInstanceOf(StemmerInterface::class, $this->stemmer);
    }

    /**
     * Don't stem such a short word (three or fewer characters)
     */
    public function testStemReturnImmediatelyOnShortWord(): void
    {
        self::assertSame('mei', $this->stemmer->stem('mei'));
        self::assertSame('bui', $this->stemmer->stem('bui'));
    }

    /**
     * To prevent overstemming : nilai could have been overstemmed to nila
     * if we don't lookup against the dictionary
     */
    public function testStemReturnImmediatelyIfFoundOnDictionary(): void
    {
        $this->stemmer->getDictionary()->add('nila');
        self::assertSame('nila', $this->stemmer->stem('nilai'));
        $this->stemmer->getDictionary()->add('nilai');
        self::assertSame('nilai', $this->stemmer->stem('nilai'));
    }
}
