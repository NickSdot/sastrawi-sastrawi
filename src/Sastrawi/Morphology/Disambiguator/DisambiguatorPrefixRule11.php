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
 * Disambiguate Prefix Rule 11
 * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
 */
final class DisambiguatorPrefixRule11 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 11
     * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^mem([bfv])(.*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1] . $matches[2];
        }

        return null;
    }
}
