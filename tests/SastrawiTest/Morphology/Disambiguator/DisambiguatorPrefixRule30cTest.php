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
 * Disambiguate Prefix Rule 30c
 * Rule 30c : pengV -> pengV- where V = 'e'
 */

final class DisambiguatorPrefixRule30cTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30c();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('tahuan', $this->subject->disambiguate('pengetahuan'));
        $this->assertEquals('blog', $this->subject->disambiguate('pengeblog'));
        $this->assertEquals('test', $this->subject->disambiguate('pengetest'));
    }
}
