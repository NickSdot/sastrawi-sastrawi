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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule30c;

/**
 * Disambiguate Prefix Rule 30c
 * Rule 30c : pengV -> pengV- where V = 'e'
 */

final class DisambiguatorPrefixRule30cTest extends TestCase
{
    public DisambiguatorPrefixRule30c $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule30c();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('tahuan', $this->subject->disambiguate('pengetahuan'));
        self::assertSame('blog', $this->subject->disambiguate('pengeblog'));
        self::assertSame('test', $this->subject->disambiguate('pengetest'));
    }
}
