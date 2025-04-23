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

use function file;
use function function_exists;
use function is_readable;

/**
 * Stemmer factory helps to create pre-configured stemmer
 */
final class StemmerFactory
{
    public const string APC_KEY = 'sastrawi_cache_dictionary';

    public const string KATA_DASAR_FILE_PATH = __DIR__ . '/../../../data/kata-dasar.txt';

    /**
     * @throws \Exception
     */
    public function createStemmer(bool $isDev = false): StemmerInterface
    {
        $stemmer    = new Stemmer($this->createDefaultDictionary($isDev));

        $resultCache   = new Cache\ArrayCache();

        return new CachedStemmer($resultCache, $stemmer);
    }

    /**
     * @throws \Exception
     */
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

        $words = (array) apc_fetch(self::APC_KEY);

        if ([] === $words) {
            $words = $this->getWordsFromFile();

            apc_store(self::APC_KEY, $words);
        }

        /** @var list<string> $words */
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

        if (false === $data = file($dictionaryFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES)) {
            throw new \Exception('Dictionary file could not be read.');
        }

        return $data;
    }
}
