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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule1b;

/**
* Disambiguate Prefix Rule 1a
* Rule 1b : berV -> be-rV
*/
final class DisambiguatorPrefixRule1bTest extends TestCase
{
    public DisambiguatorPrefixRule1b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule1b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('rakit', $this->subject->disambiguate('berakit'));
        self::assertNull($this->subject->disambiguate('bertabur'));
    }
}
