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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule23;

/**
 * Disambiguate Prefix Rule 23
 * Rule 23 : perCAP -> per-CAP where C  !==  'r' AND P  !==  'er'
 */
final class DisambiguatorPrefixRule23Test extends TestCase
{
    public DisambiguatorPrefixRule23 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule23();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tahan', $this->subject->disambiguate('pertahan'));
    }
}
