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
 * Disambiguate Prefix Rule 13b
 * Rule 13b : mem{rV|V} -> me-p{rV|V}
 */

final class DisambiguatorPrefixRule13bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule13b();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('pakai', $this->subject->disambiguate('memakai'));
    }
}
