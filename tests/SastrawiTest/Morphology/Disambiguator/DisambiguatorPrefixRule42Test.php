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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule42;

/**
 * Disambiguate Prefix Rule 42
 * Rule 42 : kauA -> kau-A
 */

final class DisambiguatorPrefixRule42Test extends TestCase
{
    public DisambiguatorPrefixRule42 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule42();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('miliki', $this->subject->disambiguate('kaumiliki'));
    }
}
