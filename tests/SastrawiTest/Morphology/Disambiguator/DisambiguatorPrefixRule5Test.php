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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule5;

/**
 * Disambiguate Prefix Rule 5
 * Rule 5 : beC1erC2 -> be-C1erC2 where C1  !==  'r'
 */
final class DisambiguatorPrefixRule5Test extends TestCase
{
    public DisambiguatorPrefixRule5 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule5();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('kerja', $this->subject->disambiguate('bekerja'));
        self::assertNull($this->subject->disambiguate('belajar'));
    }
}
