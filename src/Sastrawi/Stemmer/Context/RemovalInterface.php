<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context;

/**
 * Container of a removed part during the stemming process.
 *
 * @since  0.2.0
 * @author Andy Librian <andylibrian@gmail.com>
 */
interface RemovalInterface
{
    public function getVisitor(): Visitor\VisitorInterface;

    public function getSubject(): string;

    public function getResult(): string;

    public function getRemovedPart(): string;

    public function getAffixType(): string;
}
