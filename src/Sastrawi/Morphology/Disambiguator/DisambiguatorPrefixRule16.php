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
 * Disambiguate Prefix Rule 16
 * Original Nazief and Adriani's Rule 16 : meng{g|h|q} -> meng-{g|h|q}
 * Modified Jelita Asian's CS Rule 16 : meng{g|h|q|k} -> meng-{g|h|q|k} to stem mengkritik
 */
final class DisambiguatorPrefixRule16 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 16
     * Original Nazief and Adriani's Rule 16 : meng{g|h|q} -> meng-{g|h|q}
     * Modified Jelita Asian's CS Rule 16 : meng{g|h|q|k} -> meng-{g|h|q|k} to stem mengkritik
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^meng([ghqk])(.*)$/', $word, $matches);

        if (1 === $contains) {
            return $matches[1] . $matches[2];
        }

        return null;
    }
}
