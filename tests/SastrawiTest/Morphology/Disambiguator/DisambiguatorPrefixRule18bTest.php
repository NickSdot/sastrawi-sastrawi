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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule18b;

/**
 * Disambiguate Prefix Rule 18b
 * Original Rule 18 : menyV -> meny-sV
 * Modified by CC (shifted into 18b, see also 18a)
 */
final class DisambiguatorPrefixRule18bTest extends TestCase
{
    public DisambiguatorPrefixRule18b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule18b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('sapu', $this->subject->disambiguate('menyapu'));
        self::assertSame('sikat', $this->subject->disambiguate('menyikat'));
    }
}
