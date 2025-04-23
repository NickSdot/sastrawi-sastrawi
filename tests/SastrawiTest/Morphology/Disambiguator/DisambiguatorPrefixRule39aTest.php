<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace SastrawiTest\Morphology\Disambiguator;

use PHPUnit\Framework\TestCase;
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule39a;

/**
 * Disambiguate Prefix Rule 39a (CC infix rules)
 * Rule 39a : CemV -> CemV
 */

final class DisambiguatorPrefixRule39aTest extends TestCase
{
    public DisambiguatorPrefixRule39a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule39a();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('pemain', $this->subject->disambiguate('pemain'));
    }
}
