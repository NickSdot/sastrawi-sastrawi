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
 * Disambiguate Prefix Rule 17c
 * Rule 17c : mengV -> mengV- where V = 'e'
 */
final class DisambiguatorPrefixRule17c implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17c
     * Rule 17c : mengV -> mengV- where V = 'e'
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^menge(.*)$/', $word, $matches)) {
            return $matches[1];
        }

        return null;
    }
}
