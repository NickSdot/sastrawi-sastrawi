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
 * Disambiguate Prefix Rule 12
 * Nazief and Adriani Rule 12 : mempe{r|l} -> mem-pe{r|l}
 * Modified by Jelita Asian's CS Rule 12 : mempe -> mem-pe to stem mempengaruhi
 */
final class DisambiguatorPrefixRule12 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 12
     * Nazief and Adriani Original Rule 12 : mempe{r|l} -> mem-pe{r|l}
     * Modified by Jelita Asian's CS Rule 12 : mempe -> mem-pe to stem mempengaruhi
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^mempe(.*)$/', $word, $matches);

        if (1 === $contains) {
            return 'pe' . $matches[1];
        }

        return null;
    }
}
