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
 * Disambiguate Prefix Rule 7
 * Rule 7 : terCerV -> ter-CerV where C  !==  'r'
 */
final class DisambiguatorPrefixRule7 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 7
     * Rule 7 : terCerV -> ter-CerV where C  !==  'r'
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ter([bcdfghjklmnpqrstvwxyz])er([aiueo].*)$/', $word, $matches);

        if (1 === $contains) {
            if ('r' === $matches[1]) {
                return null;
            }

            return $matches[1] . 'er' . $matches[2];
        }

        return null;
    }
}
