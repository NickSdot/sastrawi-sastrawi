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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30b;

/**
 * Disambiguate Prefix Rule 30b
 * Rule 30b : pengV -> peng-kV
 */

final class DisambiguatorPrefixRule30bTest extends TestCase
{
    public DisambiguatorPrefixRule30b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule30b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('kawal', $this->subject->disambiguate('pengawal'));
        self::assertSame('ketat', $this->subject->disambiguate('pengetat'));
        self::assertSame('kira', $this->subject->disambiguate('pengira'));
        self::assertSame('korban', $this->subject->disambiguate('pengorban'));
        self::assertSame('kuat', $this->subject->disambiguate('penguat'));
    }
}
