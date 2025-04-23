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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule4;

/**
* Disambiguate Prefix Rule 4
* Rule 4 : belajar -> bel-ajar
*/
final class DisambiguatorPrefixRule4Test extends TestCase
{
    public DisambiguatorPrefixRule4 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule4();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('ajar', $this->subject->disambiguate('belajar'));
        self::assertNull($this->subject->disambiguate('bekerja'));
    }
}
