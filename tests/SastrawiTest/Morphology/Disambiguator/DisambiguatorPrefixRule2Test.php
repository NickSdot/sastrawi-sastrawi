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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule2;

/**
* Disambiguate Prefix Rule 2
* Rule 2 : berCAP -> ber-CAP where C  !==  'r' AND P  !==  'er'
*/
final class DisambiguatorPrefixRule2Test extends TestCase
{
    public DisambiguatorPrefixRule2 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule2();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tabur', $this->subject->disambiguate('bertabur'));
        self::assertNull($this->subject->disambiguate('beria-ia'));
    }
}
