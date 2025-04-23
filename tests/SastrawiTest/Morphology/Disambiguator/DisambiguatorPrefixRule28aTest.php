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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule28a;

/**
 * Disambiguate Prefix Rule 28a
 * Rule 28a : pen{V} -> pe-n{V}
 */
final class DisambiguatorPrefixRule28aTest extends TestCase
{
    public DisambiguatorPrefixRule28a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule28a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('nilai', $this->subject->disambiguate('penilai'));
    }
}
