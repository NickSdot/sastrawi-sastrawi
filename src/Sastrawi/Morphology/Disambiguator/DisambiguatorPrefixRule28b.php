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
 * Disambiguate Prefix Rule 28b
 * Rule 28b : pen{V} -> pe-t{V}
 */
final class DisambiguatorPrefixRule28b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 28b
     * Rule 28b : pen{V} -> pe-t{V}
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^pen([aiueo])(.*)$/', $word, $matches)) {
            return 't' . $matches[1] . $matches[2];
        }

        return null;
    }
}
