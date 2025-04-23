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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule18a;

/**
 * Disambiguate Prefix Rule 18a
 * CC Rule 18a : menyV -> me-nyV to stem menyala -> nyala
 */
final class DisambiguatorPrefixRule18aTest extends TestCase
{
    public DisambiguatorPrefixRule18a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule18a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('nyala', $this->subject->disambiguate('menyala'));
    }
}
