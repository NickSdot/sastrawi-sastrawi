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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule13a;

/**
 * Disambiguate Prefix Rule 13a
 * Rule 13a : mem{rV|V} -> me-m{rV|V}
 */

final class DisambiguatorPrefixRule13aTest extends TestCase
{
    public DisambiguatorPrefixRule13a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule13a();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('masuki', $this->subject->disambiguate('memasuki'));
    }
}
