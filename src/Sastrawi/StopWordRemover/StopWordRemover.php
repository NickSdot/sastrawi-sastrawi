<?php

declare(strict_types=1);

namespace Sastrawi\StopWordRemover;

use Sastrawi\Dictionary\DictionaryInterface;

class StopWordRemover
{
    public function __construct(
        protected DictionaryInterface $dictionary
    ) {}

    public function getDictionary(): DictionaryInterface
    {
        return $this->dictionary;
    }

    /**
     * Remove stop words.
     *
     * @param string $text The text which stop words to be removed
     *
     * @return string The text after removal
     */
    public function remove(string $text): string
    {
        $words = explode(' ', $text);

        foreach ($words as $i => $word) {
            if ($this->dictionary->contains($word)) {
                unset($words[$i]);
            }
        }

        return implode(' ', $words);
    }
}
