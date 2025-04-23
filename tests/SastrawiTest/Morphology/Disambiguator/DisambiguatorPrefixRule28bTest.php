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
        self::assertEquals('tari', $this->subject->disambiguate('penari'));
        self::assertEquals('terap', $this->subject->disambiguate('penerap'));
        self::assertEquals('tinggalan', $this->subject->disambiguate('peninggalan'));
        self::assertEquals('tolong', $this->subject->disambiguate('penolong'));
        self::assertEquals('tulis', $this->subject->disambiguate('penulis'));
    }
}
