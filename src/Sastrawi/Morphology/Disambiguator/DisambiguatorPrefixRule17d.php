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
 * Disambiguate Prefix Rule 17d
 * Rule 17d : mengV -> me-ngV
 */
class DisambiguatorPrefixRule17d implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 17d
     * Rule 17d : mengV -> me-ngV
     */
    public function disambiguate(string $word): ?string
    {
        if (1 === preg_match('/^meng([aiueo])(.*)$/', $word, $matches)) {
            return 'ng'.$matches[1].$matches[2];
        }

        return null;
    }
}
