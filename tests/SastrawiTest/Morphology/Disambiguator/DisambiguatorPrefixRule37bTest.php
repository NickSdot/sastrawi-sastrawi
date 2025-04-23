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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule37b;

/**
 * Disambiguate Prefix Rule 37b (CC infix rules)
 * Rule 37b : CerV -> CV
 */

final class DisambiguatorPrefixRule37bTest extends TestCase
{
    public DisambiguatorPrefixRule37b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule37b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('gigi', $this->subject->disambiguate('gerigi'));
        self::assertSame('sabut', $this->subject->disambiguate('serabut'));
    }
}
