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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule16;

/**
 * Disambiguate Prefix Rule 16
 * Original Nazief and Adrian's Rule 16 : meng{g|h|q} -> meng-{g|h|q}
 * Modified Jelita Asian's CS Rule 16 : meng{g|h|q|k} -> meng-{g|h|q|k} to stem mengkritik
 */
final class DisambiguatorPrefixRule16Test extends TestCase
{
    public DisambiguatorPrefixRule16 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule16();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('gunakan', $this->subject->disambiguate('menggunakan'));
        self::assertSame('hambat', $this->subject->disambiguate('menghambat'));
        self::assertSame('qasar', $this->subject->disambiguate('mengqasar'));
        self::assertSame('kritik', $this->subject->disambiguate('mengkritik'));

        self::assertNull($this->subject->disambiguate('mengira'));
    }
}
