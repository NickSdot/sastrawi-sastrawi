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
 * Disambiguate Prefix Rule 30b
 * Rule 30b : pengV -> peng-kV
 */

final class DisambiguatorPrefixRule30bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('kawal', $this->subject->disambiguate('pengawal'));
        self::assertEquals('ketat', $this->subject->disambiguate('pengetat'));
        self::assertEquals('kira', $this->subject->disambiguate('pengira'));
        self::assertEquals('korban', $this->subject->disambiguate('pengorban'));
        self::assertEquals('kuat', $this->subject->disambiguate('penguat'));
    }
}
