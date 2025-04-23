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
* Disambiguate Prefix Rule 3
* Rule 3 : berCAerV -> ber-CAerV where C  !==  'r'
*
*/
final class DisambiguatorPrefixRule3 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 3
     * Rule 3 : berCAerV -> ber-CAerV where C  !==  'r'
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ber([bcdfghjklmnpqrstvwxyz])([a-z])er([aiueo])(.*)$/', $word, $matches);

        if (1 === $contains) {
            if ('r' === $matches[1]) {
                return null;
            }

            return $matches[1] . $matches[2] . 'er' . $matches[3] . $matches[4];
        }

        return null;
    }
}
