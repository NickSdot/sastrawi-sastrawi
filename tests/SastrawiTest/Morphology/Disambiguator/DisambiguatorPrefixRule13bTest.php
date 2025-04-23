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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule13b;

/**
 * Disambiguate Prefix Rule 13b
 * Rule 13b : mem{rV|V} -> me-p{rV|V}
 */

final class DisambiguatorPrefixRule13bTest extends TestCase
{
    public DisambiguatorPrefixRule13b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule13b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('pakai', $this->subject->disambiguate('memakai'));
    }
}
