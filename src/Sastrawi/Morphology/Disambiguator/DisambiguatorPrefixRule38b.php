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
 * Disambiguate Prefix Rule 38b (CC infix rules)
 * Rule 38b : CelV -> CV
 */
final class DisambiguatorPrefixRule38b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 38b (CC infix rules)
     * Rule 38b : CelV -> CV
     */
    public function disambiguate(string $word): ?string
    {
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])el([aiueo])(.*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1] . $matches[2] . $matches[3];
        }

        return null;
    }
}
