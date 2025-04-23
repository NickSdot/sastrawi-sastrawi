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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule15b;

/**
 * Disambiguate Prefix Rule 15b
 * Rule 15 : men{V} -> me-t{V}
 */
final class DisambiguatorPrefixRule15bTest extends TestCase
{
    public DisambiguatorPrefixRule15b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule15b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tulis', $this->subject->disambiguate('menulis'));
        self::assertSame('tari', $this->subject->disambiguate('menari'));

        self::assertNull($this->subject->disambiguate('menyayangi'));
    }
}
