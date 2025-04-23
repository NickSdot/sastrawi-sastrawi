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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule27;

/**
 * Disambiguate Prefix Rule 27
 * Rule 27 : pen{c|d|j|z} -> pen-{c|d|j|z}
 */
final class DisambiguatorPrefixRule27Test extends TestCase
{
    public DisambiguatorPrefixRule27 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule27();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('cari', $this->subject->disambiguate('pencari'));
        self::assertSame('daki', $this->subject->disambiguate('pendaki'));
        self::assertSame('jual', $this->subject->disambiguate('penjual'));
    }
}
