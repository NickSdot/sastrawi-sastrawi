<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace SastrawiTest\Morphology\Disambiguator;

use PHPUnit\Framework\TestCase;
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule37a;

/**
 * Disambiguate Prefix Rule 37a (CC infix rules)
 * Rule 37a : CerV -> CerV
 */

final class DisambiguatorPrefixRule37aTest extends TestCase
{
    public DisambiguatorPrefixRule37a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule37a();
    }

    public function testDisambiguate(): void
    {
        //todo: Not sure if this is a good example
        self::assertEquals('perang', $this->subject->disambiguate('perang'));
    }
}
