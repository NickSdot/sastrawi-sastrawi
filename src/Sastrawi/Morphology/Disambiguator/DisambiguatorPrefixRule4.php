<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology\Disambiguator;

/**
* Disambiguate Prefix Rule 4
* Rule 4 : belajar -> bel-ajar
*/
final class DisambiguatorPrefixRule4 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 4
     * Rule 4 : belajar -> bel-ajar
     */
    public function disambiguate(string $word): ?string
    {
        if ('belajar' === $word) {
            return 'ajar';
        }

        return null;
    }
}
