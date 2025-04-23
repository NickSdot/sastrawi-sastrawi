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
 * Disambiguate Prefix Rule 37a (CC infix rules)
 * Rule 37a : CerV -> CerV
 */
final class DisambiguatorPrefixRule37a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 37a (CC infix rules)
     * Rule 37a : CerV -> CerV
     */
    public function disambiguate(string $word): ?string
    {
        $contains = preg_match('/^([bcdfghjklmnpqrstvwxyz])(er[aiueo])(.*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1] . $matches[2] . $matches[3];
        }

        return null;
    }
}
