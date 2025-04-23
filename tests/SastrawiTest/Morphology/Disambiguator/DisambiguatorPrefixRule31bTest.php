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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule31b;

/**
 * Disambiguate Prefix Rule 31b
 * Original Rule 31 : penyV -> peny-sV
 * Modified by CC, shifted to 31b
 */

final class DisambiguatorPrefixRule31bTest extends TestCase
{
    public DisambiguatorPrefixRule31b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule31b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('salut', $this->subject->disambiguate('penyalut'));
        self::assertSame('sekat', $this->subject->disambiguate('penyekat'));
        self::assertSame('sikat', $this->subject->disambiguate('penyikat'));
        self::assertSame('sukat', $this->subject->disambiguate('penyukat'));
    }
}
