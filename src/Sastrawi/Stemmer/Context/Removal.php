<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context;

use Sastrawi\Stemmer\Context\Visitor\VisitorInterface;

/**
 * Standard implementation of Removal Interface.
 */
final class Removal implements RemovalInterface
{
    public function __construct(
        protected VisitorInterface $visitor,
        protected string $subject,
        protected string $result,
        protected string $removedPart,
        protected string $affixType
    ) {}

    public function getVisitor(): VisitorInterface
    {
        return $this->visitor;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }

    public function getResult(): string
    {
        return $this->result;
    }

    public function getRemovedPart(): string
    {
        return $this->removedPart;
    }

    public function getAffixType(): string
    {
        return $this->affixType;
    }
}
