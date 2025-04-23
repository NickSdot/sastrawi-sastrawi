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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule41;

/**
 * Disambiguate Prefix Rule 41
 * Rule 41 : kuA -> ku-A
 */

final class DisambiguatorPrefixRule41Test extends TestCase
{
    public DisambiguatorPrefixRule41 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule41();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('miliki', $this->subject->disambiguate('kumiliki'));
    }
}
