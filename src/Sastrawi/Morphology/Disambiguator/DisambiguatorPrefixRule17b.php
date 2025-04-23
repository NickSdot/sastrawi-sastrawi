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
 * Disambiguate Prefix Rule 17b
 * Rule 17b : mengV -> meng-kV
 */
final class DisambiguatorPrefixRule17b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17b
     * Rule 17b : mengV -> meng-kV
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^meng([aiueo])(.*)$/', $word, $matches);

        if (1 === $contains) {
            return 'k' . $matches[1] . $matches[2];
        }

        return null;
    }
}
