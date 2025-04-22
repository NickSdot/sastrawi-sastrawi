<?php

declare(strict_types=1);

namespace SastrawiTest\Dictionary;

use Sastrawi\Dictionary\ArrayDictionary;

final class ArrayDictionaryTest extends \PHPUnit\Framework\TestCase
{
    private ArrayDictionary $dictionary;

    protected function setUp(): void
    {
        $this->dictionary = new ArrayDictionary();
    }

    public function testDictionaryImplementsDictionaryInterface(): void
    {
        $this->assertInstanceOf(\Sastrawi\Dictionary\DictionaryInterface::class, $this->dictionary);
    }

    public function testAddAndContain(): void
    {
        $this->assertFalse($this->dictionary->contains('word'));
        $this->dictionary->add('word');
        $this->assertTrue($this->dictionary->contains('word'));
    }

    public function testAddCountWord(): void
    {
        $this->assertCount(0, $this->dictionary);
        $this->dictionary->add('word');
        $this->assertCount(1, $this->dictionary);
    }

    /**
     * So weird. Let's take a look at this later.
     * There are '' word in the dictionary. Where is it from?
     */
    public function testAddWordIgnoreEmptyString(): void
    {
        $this->assertCount(0, $this->dictionary);
        $this->dictionary->add('');
        $this->assertCount(0, $this->dictionary);
    }

    public function testAddWords(): void
    {
        $words = [
            'word1',
            'word2',
        ];

        $this->dictionary->addWords($words);
        $this->assertCount(2, $this->dictionary);
        $this->assertTrue($this->dictionary->contains('word1'));
        $this->assertTrue($this->dictionary->contains('word2'));
    }

    public function testConstructorPreserveWords(): void
    {
        $words = [
            'word1',
            'word2',
        ];

        $dictionary = new ArrayDictionary($words);
        $this->assertCount(2, $dictionary);
        $this->assertTrue($dictionary->contains('word1'));
        $this->assertTrue($dictionary->contains('word2'));
    }
}
