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
 * Disambiguate Prefix Rule 13a
 * Rule 13a : mem{rV|V} -> me-m{rV|V}
 */
class DisambiguatorPrefixRule13a implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 13a
     * Rule 13a : mem{rV|V} -> me-m{rV|V}
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^mem([aiueo])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return 'm' . $matches[1] . $matches[2];
        }

        return null;
    }
}
