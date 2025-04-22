<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Dictionary;

/**
 * Implementation of the DictionaryInterface using Array
 */
class ArrayDictionary implements DictionaryInterface
{
    /**
     * @var string[]
     */
    protected $words = [];

    public function __construct(array $words = [])
    {
        $this->addWords($words);
    }

    /**
     * {@inheritdoc}
     */
    public function contains($word): bool
    {
        return isset($this->words[$word]);
    }

    /**
     * {@inheritdoc}
     */
    public function count(): int
    {
        return count($this->words);
    }

    /**
     * Add multiple words to the dictionary
     */
    public function addWords(array $words): void
    {
        foreach ($words as $word) {
            $this->add($word);
        }
    }

    /**
     * Add a word to the dictionary
     *
     * @param  string $word
     */
    public function add($word): void
    {
        if ($word === '') {
            return;
        }

        $this->words[$word] = $word;
    }

    /**
     * Remove a word from the dictionary
     *
     * @param  string $word
     */
    public function remove($word): void
    {
        unset($this->words[$word]);
    }

    /**
     * Add words from a text file to the dictionary
     *
     * @param  string $word
     */
    public function addWordsFromTextFile($filePath, $delimiter = "\n"): void
    {
        $words = explode($delimiter, file_get_contents($filePath));
        $this->addWords($words);
    }
}
