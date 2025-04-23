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
 * Disambiguate Prefix Rule 32
 * Rule 32 : pelV -> pe-lV except pelajar -> ajar
 */

final class DisambiguatorPrefixRule32Test extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule32();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('ajar', $this->subject->disambiguate('pelajar'));
        self::assertEquals('layan', $this->subject->disambiguate('pelayan'));
        self::assertEquals('ledak', $this->subject->disambiguate('peledak'));
        self::assertEquals('lirik', $this->subject->disambiguate('pelirik'));
        self::assertEquals('lobi', $this->subject->disambiguate('pelobi'));
        self::assertEquals('lupa', $this->subject->disambiguate('pelupa'));
    }
}
