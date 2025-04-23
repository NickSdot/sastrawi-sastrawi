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
class Removal implements RemovalInterface
{
    /**
     * @param string                                             $subject
     * @param string                                             $result
     * @param string                                             $removedPart
     * @param string                                             $affixType
     */
    public function __construct(protected VisitorInterface $visitor, protected $subject, protected $result, protected $removedPart, protected $affixType)
    {
    }

    public function getVisitor(): VisitorInterface
    {
        return $this->visitor;
    }

    public function getSubject()
    {
        return $this->subject;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function getRemovedPart()
    {
        return $this->removedPart;
    }

    public function getAffixType()
    {
        return $this->affixType;
    }
}
