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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule8;

/**
 * Disambiguate Prefix Rule 8
 * Rule 8 : terCP -> ter-CP where C  !==  'r' and P  !==  'er'
 */
final class DisambiguatorPrefixRule8Test extends TestCase
{
    public DisambiguatorPrefixRule8 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule8();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tangkap', $this->subject->disambiguate('tertangkap'));
        self::assertNull($this->subject->disambiguate('teracun'));
        self::assertNull($this->subject->disambiguate('terperuk'));
    }
}
