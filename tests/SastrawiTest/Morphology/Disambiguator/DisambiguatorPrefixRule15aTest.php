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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule15a;

/**
 * Disambiguate Prefix Rule 15a
 * Rule 15a : men{V} -> me-n{V}
 */

final class DisambiguatorPrefixRule15aTest extends TestCase
{
    public DisambiguatorPrefixRule15a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule15a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('nikmati', $this->subject->disambiguate('menikmati'));
        self::assertNull($this->subject->disambiguate('menyayangi'));
    }
}
