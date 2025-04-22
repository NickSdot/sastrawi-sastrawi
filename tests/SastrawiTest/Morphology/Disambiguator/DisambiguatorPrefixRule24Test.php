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
 * Disambiguate Prefix Rule 24
 * Rule 24 : perCAerV -> per-CAerV where C != 'r'
 */
final class DisambiguatorPrefixRule24Test extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule24();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('daerah', $this->subject->disambiguate('perdaerah'));
    }
}
