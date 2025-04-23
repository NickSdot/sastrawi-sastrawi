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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule36;

/**
 * Disambiguate Prefix Rule 36 (CS additional rules)
 * Rule 36 : peC1erC2 -> pe-C1erC2 where C1  !==  {r|w|y|l|m|n}
 */

final class DisambiguatorPrefixRule36Test extends TestCase
{
    public DisambiguatorPrefixRule36 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule36();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('kerja', $this->subject->disambiguate('pekerja'));
        self::assertEquals('serta', $this->subject->disambiguate('peserta'));
    }
}
