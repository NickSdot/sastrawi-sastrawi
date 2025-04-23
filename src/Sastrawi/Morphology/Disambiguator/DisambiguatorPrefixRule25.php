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
 * Disambiguate Prefix Rule 25
 * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
 */
class DisambiguatorPrefixRule25 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 25
     * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^pem([bfv])(.*)$/', $word, $matches)) {
            return $matches[1] . $matches[2];
        }

        return null;
    }
}
