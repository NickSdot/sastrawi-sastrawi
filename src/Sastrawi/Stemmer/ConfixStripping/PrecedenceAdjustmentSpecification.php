<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer\ConfixStripping;

use Sastrawi\Specification\SpecificationInterface;

/**
 * Confix Stripping Rule Precedence Adjustment Specification.
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval” page 78-79.
 *
 * @link   http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
class PrecedenceAdjustmentSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(string $word): bool
    {
        $regexRules = [
            '/^be(.*)lah$/',
            '/^be(.*)an$/',
            '/^me(.*)i$/',
            '/^di(.*)i$/',
            '/^pe(.*)i$/',
            '/^ter(.*)i$/',
        ];

        return array_any($regexRules, fn($rule): bool => 1 === preg_match($rule, $word));
    }
}
