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
* Disambiguate Prefix Rule 2
* Rule 2 : berCAP -> ber-CAP where C  !==  'r' AND P  !==  'er'
*/
final class DisambiguatorPrefixRule2 implements DisambiguatorInterface
{
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ber([bcdfghjklmnpqrstvwxyz])([a-z])(.*)$/', $word, $matches);

        if (1 === $contains) {
            if (1 === preg_match('/^er(.*)$/', $matches[3])) {
                return null;
            }

            return $matches[1] . $matches[2] . $matches[3];
        }

        return null;
    }
}
