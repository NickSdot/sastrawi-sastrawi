<?php

namespace SastrawiTest\Dictionary;

use Sastrawi\Dictionary\ArrayDictionary;

class ArrayDictionaryTest extends \PHPUnit\Framework\TestCase
{
    protected ArrayDictionary $dictionary;

    public function setUp(): void
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
        $this->assertEquals(0, $this->dictionary->count());
        $this->dictionary->add('word');
        $this->assertEquals(1, $this->dictionary->count());
    }

    /**
     * So weird. Let's take a look at this later.
     * There are '' word in the dictionary. Where is it from?
     */
    public function testAddWordIgnoreEmptyString(): void
    {
        $this->assertEquals(0, $this->dictionary->count());
        $this->dictionary->add('');
        $this->assertEquals(0, $this->dictionary->count());
    }

    public function testAddWords(): void
    {
        $words = array(
            'word1',
            'word2',
        );

        $this->dictionary->addWords($words);
        $this->assertEquals(2, $this->dictionary->count());
        $this->assertTrue($this->dictionary->contains('word1'));
        $this->assertTrue($this->dictionary->contains('word2'));
    }

    public function testConstructorPreserveWords(): void
    {
        $words = array(
            'word1',
            'word2',
        );

        $dictionary = new ArrayDictionary($words);
        $this->assertEquals(2, $dictionary->count());
        $this->assertTrue($dictionary->contains('word1'));
        $this->assertTrue($dictionary->contains('word2'));
    }
}
