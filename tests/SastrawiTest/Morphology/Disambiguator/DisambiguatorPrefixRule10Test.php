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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule10;

/**
 * Disambiguate Prefix Rule 10
 * Rule 10 : me{l|r|w|y}V -> me-{l|r|w|y}V
 */
final class DisambiguatorPrefixRule10Test extends TestCase
{
    public DisambiguatorPrefixRule10 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule10();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('lalui', $this->subject->disambiguate('melalui'));
        self::assertEquals('racuni', $this->subject->disambiguate('meracuni'));
        self::assertEquals('warnai', $this->subject->disambiguate('mewarnai'));
        self::assertEquals('yakini', $this->subject->disambiguate('meyakini'));

        self::assertNull($this->subject->disambiguate('menyayangi'));
    }
}
