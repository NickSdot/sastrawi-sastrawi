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
 * Disambiguate Prefix Rule 15b
 * Rule 15 : men{V} -> me-t{V}
 */
final class DisambiguatorPrefixRule15bTest extends \PHPUnit\Framework\TestCase
{
    public $subject;
    public function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule15b();
    }

    public function testDisambiguate(): void
    {
        $this->assertEquals('tulis', $this->subject->disambiguate('menulis'));
        $this->assertEquals('tari', $this->subject->disambiguate('menari'));

        $this->assertNull($this->subject->disambiguate('menyayangi'));
    }
}
