<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\Stemmer;
use Sastrawi\Dictionary\ArrayDictionary;

final class StemmerTest extends \PHPUnit\Framework\TestCase
{
    private \Sastrawi\Stemmer\Stemmer $stemmer;

    public function setUp(): void
    {
        $dictionary = new ArrayDictionary(['beri']);
        $this->stemmer = new Stemmer($dictionary);
    }

    public function testStemmerImplementsStemmerInterface(): void
    {
        $this->assertInstanceOf(\Sastrawi\Stemmer\StemmerInterface::class, $this->stemmer);
    }

    /**
     * Don't stem such a short word (three or fewer characters)
     */
    public function testStemReturnImmediatelyOnShortWord(): void
    {
        $this->assertEquals('mei', $this->stemmer->stem('mei'));
        $this->assertEquals('bui', $this->stemmer->stem('bui'));
    }

    /**
     * To prevent overstemming : nilai could have been overstemmed to nila
     * if we don't lookup against the dictionary
     */
    public function testStemReturnImmediatelyIfFoundOnDictionary(): void
    {
        $this->stemmer->getDictionary()->add('nila');
        $this->assertEquals('nila', $this->stemmer->stem('nilai'));
        $this->stemmer->getDictionary()->add('nilai');
        $this->assertEquals('nilai', $this->stemmer->stem('nilai'));
    }
}
