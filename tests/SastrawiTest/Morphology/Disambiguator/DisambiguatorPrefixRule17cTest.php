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
 * Disambiguate Prefix Rule 17c
 * Rule 17c : mengV -> mengV- where V = 'e'
 */
final class DisambiguatorPrefixRule17cTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule17c();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('cas', $this->subject->disambiguate('mengecas'));
        $this->assertEquals('cat', $this->subject->disambiguate('mengecat'));
    }
}
