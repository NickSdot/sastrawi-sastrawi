<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\ArrayDictionary;

/**
 * Stemmer factory helps creating pre-configured stemmer
 */
class StemmerFactory
{
    const string APC_KEY = 'sastrawi_cache_dictionary';

    /**
     * @param bool $isDev
     *
     * @return \Sastrawi\Stemmer\CachedStemmer
     */
    public function createStemmer(bool $isDev = false): StemmerInterface
    {
        $stemmer    = new Stemmer($this->createDefaultDictionary($isDev));

        $resultCache   = new Cache\ArrayCache();

        return new CachedStemmer($resultCache, $stemmer);
    }

    public function createDefaultDictionary($isDev = false): ArrayDictionary
    {
        $words      = $this->getWords($isDev);

        return new ArrayDictionary($words);
    }

    /**
     * @throws \Exception
     */
    protected function getWords(bool $isDev = false)
    {
        if ($isDev || !function_exists('apc_fetch')) {
            $words = $this->getWordsFromFile();
        } else {
            $words = apc_fetch(self::APC_KEY);

            if ($words === false) {
                $words = $this->getWordsFromFile();
                apc_store(self::APC_KEY, $words);
            }
        }

        return $words;
    }

    protected function getWordsFromFile(): array
    {
        $dictionaryFile = __DIR__ . '/../../../data/kata-dasar.txt';
        if (!is_readable($dictionaryFile)) {
            throw new \Exception('Dictionary file is missing. It seems that your installation is corrupted.');
        }

        return explode("\n", file_get_contents($dictionaryFile));
    }
}
