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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule17b;

/**
 * Disambiguate Prefix Rule 17b
 * Rule 17b : mengV -> meng-kV
 */
final class DisambiguatorPrefixRule17bTest extends TestCase
{
    public DisambiguatorPrefixRule17b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule17b();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('kira', $this->subject->disambiguate('mengira'));
        self::assertEquals('kecil', $this->subject->disambiguate('mengecil'));
    }
}
