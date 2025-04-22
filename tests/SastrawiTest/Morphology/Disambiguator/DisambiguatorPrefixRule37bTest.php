<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 37b (CC infix rules)
 * Rule 37b : CerV -> CV
 */

final class DisambiguatorPrefixRule37bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule37b();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('gigi', $this->subject->disambiguate('gerigi'));
        $this->assertEquals('sabut', $this->subject->disambiguate('serabut'));
    }
}
