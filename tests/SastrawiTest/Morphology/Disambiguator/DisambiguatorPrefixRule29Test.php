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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule29;

/**
 * Disambiguate Prefix Rule 29
 * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
 * Modified Rule 29 by ECS : pengC -> peng-C
 */

final class DisambiguatorPrefixRule29Test extends TestCase
{
    public DisambiguatorPrefixRule29 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule29();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('ganti', $this->subject->disambiguate('pengganti'));
        self::assertSame('hajar', $this->subject->disambiguate('penghajar'));
        self::assertSame('qasar', $this->subject->disambiguate('pengqasar'));
    }
}
