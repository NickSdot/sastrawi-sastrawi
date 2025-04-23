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
 * Disambiguate Prefix Rule 29
 * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
 * Modified Rule 29 by ECS : pengC -> peng-C
 */
final class DisambiguatorPrefixRule29 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 29
     * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
     * Modified Rule 29 by ECS : pengC -> peng-C
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^peng([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }

        return null;
    }
}
