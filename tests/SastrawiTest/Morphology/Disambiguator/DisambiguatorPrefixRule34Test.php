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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule34;

/**
 * Disambiguate Prefix Rule 34
 * Rule 34 : peCP -> pe-CP where C  !==  {r|w|y|l|m|n} and P  !==  'er'
 */

final class DisambiguatorPrefixRule34Test extends TestCase
{
    public DisambiguatorPrefixRule34 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule34();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('tarung', $this->subject->disambiguate('petarung'));
    }
}
