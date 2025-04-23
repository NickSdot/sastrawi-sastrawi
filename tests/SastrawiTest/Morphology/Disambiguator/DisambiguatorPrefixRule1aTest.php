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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule1a;

/**
* Disambiguate Prefix Rule 1a
* Rule 1a : berV -> ber-V
*/
final class DisambiguatorPrefixRule1aTest extends TestCase
{
    public DisambiguatorPrefixRule1a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule1a();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('ia-ia', $this->subject->disambiguate('beria-ia'));
        self::assertNull($this->subject->disambiguate('berlari'));
    }
}
