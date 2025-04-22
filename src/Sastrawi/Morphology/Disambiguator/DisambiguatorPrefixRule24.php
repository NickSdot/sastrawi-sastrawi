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
 * Disambiguate Prefix Rule 24
 * Rule 24 : perCAerV -> per-CAerV where C != 'r'
 */
class DisambiguatorPrefixRule24 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 24
     * Rule 24 : perCAerV -> per-CAerV where C != 'r'
     */
    public function disambiguate($word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^per([bcdfghjklmnpqrstvwxyz])([a-z])er([aiueo])(.*)$/', (string) $word, $matches);

        if ($contains === 1) {
            if ($matches[1] === 'r') {
                return null;
            }

            return $matches[1] . $matches[2] . 'er' . $matches[3] . $matches[4];
        }

        return null;
    }
}
