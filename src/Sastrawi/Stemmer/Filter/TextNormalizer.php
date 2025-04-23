<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer\Filter;

/**
 * Class for normalize text before the stemming process
 */
class TextNormalizer
{
    /**
     * Removes symbols & characters other than alphabetics
     *
     * @param  string $text
     * @return string normalized text
     */
    public static function normalizeText(string $text): string
    {
        $text = strtolower($text);
        $text = preg_replace('/[^a-z0-9 -]/im', ' ', $text);
        $text = preg_replace('/( +)/im', ' ', (string) $text);

        return trim((string) $text);
    }
}
