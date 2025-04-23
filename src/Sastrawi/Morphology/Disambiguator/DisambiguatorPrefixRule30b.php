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
 * Disambiguate Prefix Rule 30b
 * Rule 30b : pengV -> peng-kV
 */
final class DisambiguatorPrefixRule30b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 30b
     * Rule 30b : pengV -> peng-kV
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^peng([aiueo])(.*)$/', $word, $matches)) {
            return 'k' . $matches[1] . $matches[2];
        }

        return null;
    }
}
