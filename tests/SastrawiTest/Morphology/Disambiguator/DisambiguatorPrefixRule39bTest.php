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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule39b;

/**
 * Disambiguate Prefix Rule 39b (CC infix rules)
 * Rule 39b : CemV -> CV
 */

final class DisambiguatorPrefixRule39bTest extends TestCase
{
    public DisambiguatorPrefixRule39b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule39b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tali', $this->subject->disambiguate('temali'));
        self::assertSame('getar', $this->subject->disambiguate('gemetar'));
        self::assertSame('guruh', $this->subject->disambiguate('gemuruh'));
        self::assertSame('kerlip', $this->subject->disambiguate('kemerlip'));
        self::assertSame('kerlap', $this->subject->disambiguate('kemerlap'));
        self::assertSame('kelut', $this->subject->disambiguate('kemelut'));
    }
}
