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
 * Disambiguate Prefix Rule 21a
 * Rule 21a : perV -> per-V
 */
final class DisambiguatorPrefixRule21aTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule21a();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('adilan', $this->subject->disambiguate('peradilan'));
        $this->assertEquals('undikan', $this->subject->disambiguate('perundikan'));
        $this->assertNull($this->subject->disambiguate('perjudikan'));
    }
}
