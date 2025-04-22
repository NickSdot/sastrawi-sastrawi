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
 * Disambiguate Prefix Rule 13a
 * Rule 13a : mem{rV|V} -> me-m{rV|V}
 */

final class DisambiguatorPrefixRule13aTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule13a();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('masuki', $this->subject->disambiguate('memasuki'));
    }
}
