<?php

declare(strict_types=1);

namespace SastrawiTest\Dictionary;

use PHPUnit\Framework\TestCase;
use Sastrawi\Dictionary\ArrayDictionary;
use Sastrawi\Dictionary\DictionaryInterface;

final class ArrayDictionaryTest extends TestCase
{
    private ArrayDictionary $dictionary;

    protected function setUp(): void
    {
        $this->dictionary = new ArrayDictionary();
    }

    public function testDictionaryImplementsDictionaryInterface(): void
    {
        self::assertInstanceOf(DictionaryInterface::class, $this->dictionary);
    }

    public function testAddAndContain(): void
    {
        self::assertFalse($this->dictionary->contains('word'));
        $this->dictionary->add('word');
        self::assertTrue($this->dictionary->contains('word'));
    }

    public function testAddCountWord(): void
    {
        self::assertCount(0, $this->dictionary);
        $this->dictionary->add('word');
        self::assertCount(1, $this->dictionary);
    }

    /**
     * So weird. Let's take a look at this later.
     * There are '' word in the dictionary. Where is it from?
     */
    public function testAddWordIgnoreEmptyString(): void
    {
        self::assertCount(0, $this->dictionary);
        $this->dictionary->add('');
        self::assertCount(0, $this->dictionary);
    }

    public function testAddWords(): void
    {
        $words = [
            'word1',
            'word2',
        ];

        $this->dictionary->addWords($words);
        self::assertCount(2, $this->dictionary);
        self::assertTrue($this->dictionary->contains('word1'));
        self::assertTrue($this->dictionary->contains('word2'));
    }

    public function testConstructorPreserveWords(): void
    {
        $words = [
            'word1',
            'word2',
        ];

        $dictionary = new ArrayDictionary($words);
        self::assertCount(2, $dictionary);
        self::assertTrue($dictionary->contains('word1'));
        self::assertTrue($dictionary->contains('word2'));
    }
}
