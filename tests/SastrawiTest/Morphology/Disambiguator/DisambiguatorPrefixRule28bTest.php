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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule28b;

/**
 * Disambiguate Prefix Rule 28b
 * Rule 28b : pen{V} -> pe-t{V}
 */
final class DisambiguatorPrefixRule28bTest extends TestCase
{
    public DisambiguatorPrefixRule28b $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule28b();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tari', $this->subject->disambiguate('penari'));
        self::assertSame('terap', $this->subject->disambiguate('penerap'));
        self::assertSame('tinggalan', $this->subject->disambiguate('peninggalan'));
        self::assertSame('tolong', $this->subject->disambiguate('penolong'));
        self::assertSame('tulis', $this->subject->disambiguate('penulis'));
    }
}
