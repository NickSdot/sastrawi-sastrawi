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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule26b;

/**
 * Disambiguate Prefix Rule 26b
 * Rule 26b : pem{rV|V} -> pe-p{rV|V}
 */
final class DisambiguatorPrefixRule26bTest extends TestCase
{
    public DisambiguatorPrefixRule26b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule26b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('pilih', $this->subject->disambiguate('pemilih'));
        self::assertSame('pukul', $this->subject->disambiguate('pemukul'));
    }
}
