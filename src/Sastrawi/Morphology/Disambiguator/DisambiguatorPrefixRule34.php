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
 * Disambiguate Prefix Rule 34
 * Rule 34 : peCP -> pe-CP where C  !==  {r|w|y|l|m|n} and P  !==  'er'
 */
final class DisambiguatorPrefixRule34 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 34
     * Rule 34 : peCP -> pe-CP where C  !==  {r|w|y|l|m|n} and P  !==  'er'
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^pe([bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches)) {
            if (1 === preg_match('/^er(.*)$/', $matches[2])) {
                return null;
            }

            return $matches[1] . $matches[2];
        }

        return null;
    }
}
