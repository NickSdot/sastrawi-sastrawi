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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule6a;

/**
 * Disambiguate Prefix Rule 6a
 * Rule 6a : terV -> ter-V
 */
final class DisambiguatorPrefixRule6aTest extends TestCase
{
    public DisambiguatorPrefixRule6a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule6a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('ancam', $this->subject->disambiguate('terancam'));
        self::assertNull($this->subject->disambiguate('terbalik'));
    }
}
