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
 * Disambiguate Prefix Rule 10
 * Rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
 */
class DisambiguatorPrefixRule10 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 10
     * Rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
     */
    public function disambiguate($word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^me([lrwy])([aiueo])(.*)$/', (string) $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }
        return null;
    }
}
