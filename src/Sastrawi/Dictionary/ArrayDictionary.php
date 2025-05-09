<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Dictionary;

use function count;
use function file;

/**
 * Implementation of the DictionaryInterface using Array
 */
final class ArrayDictionary implements DictionaryInterface
{
    /**
     * @var string[]
     */
    protected array $words = [];

    /**
     * @param list<string> $words
     */
    public function __construct(array $words = [])
    {
        $this->addWords($words);
    }

    /**
     * {@inheritdoc}
     */
    public function contains(string $word): bool
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
     *
     * @param list<string> $words
     */
    public function addWords(array $words): void
    {
        foreach ($words as $word) {
            $this->add($word);
        }
    }

    /**
     * Add a word to the dictionary
     */
    public function add(string $word): void
    {
        if ('' === $word) {
            return;
        }

        $this->words[$word] = $word;
    }

    /**
     * Remove a word from the dictionary
     */
    public function remove(string $word): void
    {
        unset($this->words[$word]);
    }

    /**
     * Add words from a text file to the dictionary
     *
     *
     * @throws \Exception
     */
    public function addWordsFromTextFile(string $filePath, string $delimiter = "\n"): void
    {
        $words = file($filePath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        if ([] === $words || false === $words) {
            throw new \Exception('Dictionary file could not be read.');
        }

        $this->addWords($words);
    }
}
