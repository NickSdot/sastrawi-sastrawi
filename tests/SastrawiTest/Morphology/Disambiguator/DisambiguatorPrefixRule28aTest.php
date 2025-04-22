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
 * Disambiguate Prefix Rule 28a
 * Rule 28a : pen{V} -> pe-n{V}
 */
final class DisambiguatorPrefixRule28aTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule28a();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('nilai', $this->subject->disambiguate('penilai'));
    }
}
