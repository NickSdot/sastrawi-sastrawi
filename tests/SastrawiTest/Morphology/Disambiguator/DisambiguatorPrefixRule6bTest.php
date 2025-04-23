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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule6b;

/**
 * Disambiguate Prefix Rule 6b
 * Rule 6b : terV -> te-rV
 */
final class DisambiguatorPrefixRule6bTest extends TestCase
{
    public DisambiguatorPrefixRule6b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule6b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('racun', $this->subject->disambiguate('teracun'));
        self::assertNull($this->subject->disambiguate('terbalik'));
    }
}
