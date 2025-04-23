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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule20;

/**
 * Disambiguate Prefix Rule 20
 * Rule 20 : pe{w|y}V -> pe-{w|y}V
 */
final class DisambiguatorPrefixRule20Test extends TestCase
{
    public DisambiguatorPrefixRule20 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule20();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('warna', $this->subject->disambiguate('pewarna'));
        self::assertSame('yoga', $this->subject->disambiguate('peyoga'));
    }
}
