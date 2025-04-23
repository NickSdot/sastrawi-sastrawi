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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule17a;

/**
 * Disambiguate Prefix Rule 17a
 * Rule 17a : mengV -> meng-V
 */
final class DisambiguatorPrefixRule17aTest extends TestCase
{
    public DisambiguatorPrefixRule17a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule17a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('erat', $this->subject->disambiguate('mengerat'));
    }
}
