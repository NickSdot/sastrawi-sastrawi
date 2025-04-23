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
 * Disambiguate Prefix Rule 41
 * Rule 41 : kuA -> ku-A
 */
final class DisambiguatorPrefixRule41 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 41
     * Rule 41 : kuA -> ku-A
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^ku(.*)$/', $word, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
