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
 * Disambiguate Prefix Rule 40b (CC infix rules)
 * Rule 40b : CinV -> CV
 */

final class DisambiguatorPrefixRule40bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule40b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('kerja', $this->subject->disambiguate('kinerja'));
        self::assertEquals('sambung', $this->subject->disambiguate('sinambung'));
        self::assertEquals('tambah', $this->subject->disambiguate('tinambah'));
    }
}
