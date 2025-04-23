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
 * Disambiguate Prefix Rule 39b (CC infix rules)
 * Rule 39b : CemV -> CV
 */

final class DisambiguatorPrefixRule39bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule39b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('tali', $this->subject->disambiguate('temali'));
        self::assertEquals('getar', $this->subject->disambiguate('gemetar'));
        self::assertEquals('guruh', $this->subject->disambiguate('gemuruh'));
        self::assertEquals('kerlip', $this->subject->disambiguate('kemerlip'));
        self::assertEquals('kerlap', $this->subject->disambiguate('kemerlap'));
        self::assertEquals('kelut', $this->subject->disambiguate('kemelut'));
    }
}
