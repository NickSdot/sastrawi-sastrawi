<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Morphology;

use Sastrawi\Specification\SpecificationInterface;

use function preg_match;

/**
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 26
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
final class InvalidAffixPairSpecification implements SpecificationInterface
{
    public function isSatisfiedBy(string $word): bool
    {
        if (1 === preg_match('/^me(.*)kan$/', $word)) {
            return false;
        }

        if ('ketahui' === $word) {
            return false;
        }

        $invalidAffixes = [
            '/^ber(.*)i$/',
            '/^di(.*)an$/',
            '/^ke(.*)i$/',
            '/^ke(.*)an$/',
            '/^me(.*)an$/',
            '/^me(.*)an$/',
            '/^ter(.*)an$/',
            '/^per(.*)an$/',
        ];

        $contains = false;

        foreach ($invalidAffixes as $invalidAffix) {
            $contains = $contains || 1 === preg_match($invalidAffix, $word);
        }

        return $contains;
    }
}
