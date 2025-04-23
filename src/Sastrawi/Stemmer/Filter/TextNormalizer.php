<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Filter;

use function mb_strtolower;
use function mb_trim;
use function preg_replace;

/**
 * Class for normalize text before the stemming process
 */
final class TextNormalizer
{
    /**
     * Removes symbols & characters other than alphabetic,
     * and returns the normalized text
     */
    public static function normalizeText(string $text): string
    {
        $text = mb_strtolower($text);
        $text = preg_replace('/[^a-z0-9 -]/im', ' ', $text);
        $text = preg_replace('/( +)/im', ' ', (string) $text);

        return mb_trim((string) $text);
    }
}
