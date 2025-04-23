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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule12;

/**
 * Disambiguate Prefix Rule 12
 * Nazief and Adriani Rule 12 : mempe{r|l} -> mem-pe{r|l}
 * Modified by Jelita Asian's CS Rule 12 : mempe -> mem-pe to stem mempengaruhi
 */
final class DisambiguatorPrefixRule12Test extends TestCase
{
    public DisambiguatorPrefixRule12 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule12();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('pengaruhi', $this->subject->disambiguate('mempengaruhi'));
        self::assertSame('perbaharui', $this->subject->disambiguate('memperbaharui'));

        self::assertNull($this->subject->disambiguate('mewarnai'));
    }
}
