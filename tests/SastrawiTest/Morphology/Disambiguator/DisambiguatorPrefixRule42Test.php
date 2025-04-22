<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace SastrawiTest\Morphology\Disambiguator;

/**
 * Disambiguate Prefix Rule 42
 * Rule 42 : kauA -> kau-A
 */

final class DisambiguatorPrefixRule42Test extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule42();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('miliki', $this->subject->disambiguate('kaumiliki'));
    }
}
