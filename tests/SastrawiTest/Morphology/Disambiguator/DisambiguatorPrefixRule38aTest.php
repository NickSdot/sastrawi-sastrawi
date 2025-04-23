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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule38a;

/**
 * Disambiguate Prefix Rule 38a (CC infix rules)
 * Rule 38a : CelV -> CelV
 */

final class DisambiguatorPrefixRule38aTest extends TestCase
{
    public DisambiguatorPrefixRule38a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule38a();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('pelawat', $this->subject->disambiguate('pelawat'));
    }
}
