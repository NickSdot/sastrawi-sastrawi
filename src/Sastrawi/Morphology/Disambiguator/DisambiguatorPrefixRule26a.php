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
 * Disambiguate Prefix Rule 26a
 * Rule 26a : pem{rV|V} -> pe-m{rV|V}
 */
final class DisambiguatorPrefixRule26a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 26a
     * Rule 26a : pem{rV|V} -> pe-m{rV|V}
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^pem([aiueo])(.*)$/', $word, $matches)) {
            return 'm' . $matches[1] . $matches[2];
        }

        return null;
    }
}
