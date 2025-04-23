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
 * Stemmer factory helps to create pre-configured stemmer
 */
class StemmerFactory
{
    const string APC_KEY = 'sastrawi_cache_dictionary';
    const string KATA_DASAR_FILE_PATH = __DIR__ . '/../../../data/kata-dasar.txt';

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

    public function createDefaultDictionary(bool $isDev = false): ArrayDictionary
    {
        $words      = $this->getWords($isDev);

        return new ArrayDictionary($words);
    }

    /**
     * @return list<string>
     *
     * @throws \Exception
     */
    protected function getWords(bool $isDev = false): array
    {
        if ($isDev || !function_exists('apc_fetch')) {
            return $this->getWordsFromFile();
        }

        if (false === $words = apc_fetch(self::APC_KEY)) {
            apc_store(self::APC_KEY, $words = $this->getWordsFromFile());
        }

        return $words;
    }

    /**
     * @return list<string>
     *
     * @throws \Exception
     */
    protected function getWordsFromFile(): array
    {
        if (false === is_readable($dictionaryFile = self::KATA_DASAR_FILE_PATH)) {
            throw new \Exception('Dictionary file is missing. It seems that your installation is corrupted.');
        }

        return file($dictionaryFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    }
}
