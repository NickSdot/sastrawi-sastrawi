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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule40a;

/**
 * Disambiguate Prefix Rule 40a (CC infix rules)
 * Rule 40a : CinV -> CinV
 */

final class DisambiguatorPrefixRule40aTest extends TestCase
{
    public DisambiguatorPrefixRule40a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule40a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('pinang', $this->subject->disambiguate('pinang'));
    }
}
