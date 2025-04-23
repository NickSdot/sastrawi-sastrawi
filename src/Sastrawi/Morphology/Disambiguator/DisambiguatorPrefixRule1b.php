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
* Disambiguate Prefix Rule 1b
* Rule 1a : berV -> be-rV
*/
final class DisambiguatorPrefixRule1b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 1b
     * Rule 1b : berV -> be-rV
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

        if (1 === $contains) {
            return 'r' . $matches[1];
        }

        return null;
    }
}
