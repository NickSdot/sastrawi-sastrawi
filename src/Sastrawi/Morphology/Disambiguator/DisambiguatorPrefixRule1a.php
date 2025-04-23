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
* Disambiguate Prefix Rule 1a
* Rule 1a : berV -> ber-V
*/
final class DisambiguatorPrefixRule1a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 1a
     * Rule 1a : berV -> ber-V
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ber([aiueo].*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1];
        }

        return null;
    }
}
