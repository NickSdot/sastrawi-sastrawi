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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule21a;

/**
 * Disambiguate Prefix Rule 21a
 * Rule 21a : perV -> per-V
 */
final class DisambiguatorPrefixRule21aTest extends TestCase
{
    public DisambiguatorPrefixRule21a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule21a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('adilan', $this->subject->disambiguate('peradilan'));
        self::assertSame('undikan', $this->subject->disambiguate('perundikan'));
        self::assertNull($this->subject->disambiguate('perjudikan'));
    }
}
