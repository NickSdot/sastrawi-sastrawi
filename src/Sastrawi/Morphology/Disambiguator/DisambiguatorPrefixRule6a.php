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
 * Disambiguate Prefix Rule 6a
 * Rule 6a : terV -> ter-V
 * @return string
 */
final class DisambiguatorPrefixRule6a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 6a
     * Rule 6a : terV -> ter-V
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ter([aiueo].*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1];
        }

        return null;
    }
}
