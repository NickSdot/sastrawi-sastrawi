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
 * Disambiguate Prefix Rule 35 (CS additional rules)
 * Rule 35 : terC1erC2 -> ter-C1erC2 where C1  !==  {r}
 */
class DisambiguatorPrefixRule35 implements DisambiguatorInterface
{
    /**
     * Disambiguate Prefix Rule 35 (CS additional rules)
     * Rule 35 : terC1erC2 -> ter-C1erC2 where C1  !==  {r}
     */
    public function disambiguate(string $word): ?string
    {
        $matches  = null;
        $contains = preg_match('/^ter([bcdfghjkpqstvxz])(er[bcdfghjklmnpqrstvwxyz])(.*)$/', $word, $matches);

        if ($contains === 1) {
            return $matches[1] . $matches[2] . $matches[3];
        }

        return null;
    }
}
