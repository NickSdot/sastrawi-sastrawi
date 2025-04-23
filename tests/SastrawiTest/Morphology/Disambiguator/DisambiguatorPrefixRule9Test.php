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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule9;

/**
 * Disambiguate Prefix Rule 9
 * Rule 9 : te-C1erC2 -> te-C1erC2 where C1  !==  'r'
 */
final class DisambiguatorPrefixRule9Test extends TestCase
{
    public DisambiguatorPrefixRule9 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule9();
    }

    public function testDisambiguate(): void
    {
        // todo: need a real world example
        self::assertSame('terbang', $this->subject->disambiguate('teterbang'));
        self::assertNull($this->subject->disambiguate('terperuk'));
    }
}
