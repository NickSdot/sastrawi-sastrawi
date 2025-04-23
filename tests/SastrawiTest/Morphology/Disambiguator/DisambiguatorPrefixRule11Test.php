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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule11;

/**
 * Disambiguate Prefix Rule 11
 * Rule 11 : mem{b|f|v} -> mem-{b|f|v}
 */
final class DisambiguatorPrefixRule11Test extends TestCase
{
    public DisambiguatorPrefixRule11 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule11();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('bantu', $this->subject->disambiguate('membantu'));
        self::assertEquals('fasilitasi', $this->subject->disambiguate('memfasilitasi'));
        self::assertEquals('vonis', $this->subject->disambiguate('memvonis'));

        self::assertNull($this->subject->disambiguate('mewarnai'));
    }
}
