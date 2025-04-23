<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Dictionary;

use Countable;

/**
 * The Dictionary interface used by the stemmer.
 *
 * @since  0.1.0
 * @author Andy Librian <andylibrian@gmail.com>
 */
interface DictionaryInterface extends Countable
{
    /**
     * Checks whether a word is contained in the dictionary.
     */
    public function contains(string $word): bool;

    /**
     * Add a word to the dictionary
     */
    public function add(string $word): void;

    /**
     * Add words from a text file to the dictionary
     */
    public function addWordsFromTextFile(string $filePath, string $delimiter = "\n"): void;
}
