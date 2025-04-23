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
 * Disambiguate Prefix Rule 5
 * Rule 5 : beC1erC2 -> be-C1erC2 where C1  !==  'r'
 */
final class DisambiguatorPrefixRule5 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 5
     * Rule 5 : beC1erC2 -> be-C1erC2 where C1  !==  'r'
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^be([bcdfghjklmnpqstvwxyz])(er[bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1] . $matches[2] . $matches[3];
        }

        return null;
    }
}
