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
 * Disambiguate Prefix Rule 35 (CS additional rules)
 * Rule 35 : terC1erC2 -> ter-C1erC2 where C1  !==  {r}
 */

final class DisambiguatorPrefixRule35Test extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule35();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('percaya', $this->subject->disambiguate('terpercaya'));
    }
}
