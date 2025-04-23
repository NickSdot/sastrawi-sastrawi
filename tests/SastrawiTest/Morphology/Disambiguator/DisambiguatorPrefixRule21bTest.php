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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule21b;

/**
 * Disambiguate Prefix Rule 21b
 * Rule 21a : perV -> pe-rV
 */
final class DisambiguatorPrefixRule21bTest extends TestCase
{
    public DisambiguatorPrefixRule21b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule21b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('rusak', $this->subject->disambiguate('perusak'));
        self::assertEquals('rancang', $this->subject->disambiguate('perancang'));
        self::assertNull($this->subject->disambiguate('perjudikan'));
    }
}
