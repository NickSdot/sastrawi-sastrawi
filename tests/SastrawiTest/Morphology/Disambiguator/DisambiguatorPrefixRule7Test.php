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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule7;

/**
 * Disambiguate Prefix Rule 7
 * Rule 7 : terCerv -> ter-CerV where C  !==  'r'
 */
final class DisambiguatorPrefixRule7Test extends TestCase
{
    public DisambiguatorPrefixRule7 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule7();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('peruk', $this->subject->disambiguate('terperuk'));
    }
}
