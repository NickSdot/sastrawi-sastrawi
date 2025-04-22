<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer;

class CachedStemmer implements StemmerInterface
{
    public function __construct(protected \Sastrawi\Stemmer\Cache\CacheInterface $cache, protected \Sastrawi\Stemmer\StemmerInterface $delegatedStemmer)
    {
    }

    public function stem($text): string
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        $words = explode(' ', $normalizedText);
        $stems = [];

        foreach ($words as $word) {
            if ($this->cache->has($word)) {
                $stems[] = $this->cache->get($word);
            } else {
                $stem = $this->delegatedStemmer->stem($word);
                $this->cache->set($word, $stem);
                $stems[] = $stem;
            }
        }

        return implode(' ', $stems);
    }

    public function getCache(): \Sastrawi\Stemmer\Cache\CacheInterface
    {
        return $this->cache;
    }

    public function getDelegatedStemmer(): \Sastrawi\Stemmer\StemmerInterface
    {
        return $this->delegatedStemmer;
    }
}
