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
 * Disambiguate Prefix Rule 31b
 * Original Rule 31 : penyV -> peny-sV
 * Modified by CC, shifted to 31b
 */
final class DisambiguatorPrefixRule31b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 31b
     * Original Rule 31 : penyV -> peny-sV
     * Modified by CC, shifted to 31b
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^peny([aiueo])(.*)$/', $word, $matches)) {
            return 's' . $matches[1] . $matches[2];
        }

        return null;
    }
}
