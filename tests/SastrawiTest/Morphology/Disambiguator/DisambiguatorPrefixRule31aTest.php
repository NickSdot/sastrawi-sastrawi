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
 * Disambiguate Prefix Rule 31a
 * CC Rule 31a : penyV -> pe-nyV
 */

final class DisambiguatorPrefixRule31aTest extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule31a();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('nyanyi', $this->subject->disambiguate('penyanyi'));
    }
}
