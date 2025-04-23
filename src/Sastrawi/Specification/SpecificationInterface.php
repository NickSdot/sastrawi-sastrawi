<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Specification;

/**
 * The specification interface. Specification design pattern.
 *
 * @link http://martinfowler.com/apsupp/spec.pdf
 * @link http://mattberther.com/2005/03/25/the-specification-pattern-a-primer
 */
interface SpecificationInterface
{
    public function isSatisfiedBy(string $word): bool;
}
