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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule14;

/**
 * Disambiguate Prefix Rule no 14
 *
 * Rule 14 modified by Andy Librian : men{c|d|j|s|t|z} -> men-{c|d|j|s|t|z}
 * in order to stem mentaati
 *
 * Rule 14 modified by ECS: men{c|d|j|s|z} -> men-{c|d|j|s|z}
 * in order to stem mensyaratkan, mensyukuri
 *
 * Original CS Rule no 14 was : men{c|d|j|z} -> men-{c|d|j|z}
 */

final class DisambiguatorPrefixRule14Test extends TestCase
{
    public DisambiguatorPrefixRule14 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule14();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('cantum', $this->subject->disambiguate('mencantum'));
        self::assertSame('duduki', $this->subject->disambiguate('menduduki'));
        self::assertSame('jemput', $this->subject->disambiguate('menjemput'));
        self::assertSame('syukuri', $this->subject->disambiguate('mensyukuri'));
        self::assertSame('syaratkan', $this->subject->disambiguate('mensyaratkan'));
        self::assertSame('taati', $this->subject->disambiguate('mentaati'));
        self::assertSame('ziarahi', $this->subject->disambiguate('menziarahi'));

        self::assertNull($this->subject->disambiguate('menyayangi'));
    }
}
