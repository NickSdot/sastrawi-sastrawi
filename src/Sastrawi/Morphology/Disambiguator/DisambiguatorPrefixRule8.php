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
 * Disambiguate Prefix Rule 8
 * Rule 8 : terCP -> ter-CP where C  !==  'r' and P  !==  'er'
 */
final class DisambiguatorPrefixRule8 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 8
     * Rule 8 : terCP -> ter-CP where C  !==  'r' and P  !==  'er'
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

        if (1 === $contains) {
            if ('r' === $matches[1] || 1 === preg_match('/^er(.*)$/', $matches[2])) {
                return null;
            }

            return $matches[1] . $matches[2];
        }

        return null;
    }
}
