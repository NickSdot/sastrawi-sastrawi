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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule25;

/**
 * Disambiguate Prefix Rule 25
 * Rule 25 : pem{b|f|v} -> pem-{b|f|v}
 */
final class DisambiguatorPrefixRule25Test extends TestCase
{
    public DisambiguatorPrefixRule25 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule25();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('baruan', $this->subject->disambiguate('pembaruan'));
        self::assertSame('fokusan', $this->subject->disambiguate('pemfokusan'));
        self::assertSame('vaksinan', $this->subject->disambiguate('pemvaksinan'));
    }
}
