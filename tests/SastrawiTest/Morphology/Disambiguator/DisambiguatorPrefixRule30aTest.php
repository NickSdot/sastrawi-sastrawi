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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30a;

/**
 * Disambiguate Prefix Rule 30a
 * Rule 30a : pengV -> peng-V
 *
 */

//TODO: Maybe this rule can be combined with rule 29?
final class DisambiguatorPrefixRule30aTest extends TestCase
{
    public DisambiguatorPrefixRule30a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule30a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('alihan', $this->subject->disambiguate('pengalihan'));
        self::assertSame('eram', $this->subject->disambiguate('pengeram'));
        self::assertSame('ikat', $this->subject->disambiguate('pengikat'));
        self::assertSame('obat', $this->subject->disambiguate('pengobat'));
        self::assertSame('urusan', $this->subject->disambiguate('pengurusan'));
    }
}
