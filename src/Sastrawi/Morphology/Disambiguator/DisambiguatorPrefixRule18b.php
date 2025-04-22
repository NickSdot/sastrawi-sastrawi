<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 18b
 * Original Rule 18 : menyV -> meny-sV
 * Modified by CC (shifted into 18b, see also 18a)
 */
class DisambiguatorPrefixRule18b implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 18b
     * Original Rule 18 : menyV -> meny-sV
     * Modified by CC (shifted into 18b, see also 18a)
     */
    public function disambiguate($word): ?string
    {
        if (preg_match('/^meny([aiueo])(.*)$/', (string) $word, $matches)) {
            return 's' . $matches[1] . $matches[2];
        }
        return null;
    }
}
