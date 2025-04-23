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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule32;

/**
 * Disambiguate Prefix Rule 32
 * Rule 32 : pelV -> pe-lV except pelajar -> ajar
 */

final class DisambiguatorPrefixRule32Test extends TestCase
{
    public DisambiguatorPrefixRule32 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule32();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('ajar', $this->subject->disambiguate('pelajar'));
        self::assertSame('layan', $this->subject->disambiguate('pelayan'));
        self::assertSame('ledak', $this->subject->disambiguate('peledak'));
        self::assertSame('lirik', $this->subject->disambiguate('pelirik'));
        self::assertSame('lobi', $this->subject->disambiguate('pelobi'));
        self::assertSame('lupa', $this->subject->disambiguate('pelupa'));
    }
}
