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
 * Disambiguate Prefix Rule 38b (CC infix rules)
 * Rule 38b : CelV -> CV
 */

final class DisambiguatorPrefixRule38bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule38b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('tunjuk', $this->subject->disambiguate('telunjuk'));
        self::assertEquals('getar', $this->subject->disambiguate('geletar'));
        self::assertEquals('sidik', $this->subject->disambiguate('selidik'));
        self::assertEquals('patuk', $this->subject->disambiguate('pelatuk'));
        self::assertEquals('tapak', $this->subject->disambiguate('telapak'));
        self::assertEquals('gombang', $this->subject->disambiguate('gelombang'));
    }
}
