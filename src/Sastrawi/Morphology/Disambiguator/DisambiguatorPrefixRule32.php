<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

use function preg_match;

/**
 * Disambiguate Prefix Rule 32
 * Rule 32 : pelV -> pe-lV except pelajar -> ajar
 */
final class DisambiguatorPrefixRule32 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 32
     * Rule 32 : pelV -> pe-lV except pelajar -> ajar
     */
    public function disambiguate(string $word): ?string
    {
        if ('pelajar' === $word) {
            return 'ajar';
        }

        if (1 === preg_match('/^pe(l[aiueo])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }

        return null;
    }
}
