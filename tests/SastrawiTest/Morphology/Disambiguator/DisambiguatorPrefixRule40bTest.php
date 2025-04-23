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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule40b;

/**
 * Disambiguate Prefix Rule 40b (CC infix rules)
 * Rule 40b : CinV -> CV
 */

final class DisambiguatorPrefixRule40bTest extends TestCase
{
    public DisambiguatorPrefixRule40b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule40b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('kerja', $this->subject->disambiguate('kinerja'));
        self::assertSame('sambung', $this->subject->disambiguate('sinambung'));
        self::assertSame('tambah', $this->subject->disambiguate('tinambah'));
    }
}
