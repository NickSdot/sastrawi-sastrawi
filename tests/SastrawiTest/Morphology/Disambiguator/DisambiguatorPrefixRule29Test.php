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
 * Disambiguate Prefix Rule 29
 * Original Rule 29 : peng{g|h|q} -> peng-{g|h|q}
 * Modified Rule 29 by ECS : pengC -> peng-C
 */

final class DisambiguatorPrefixRule29Test extends \PHPUnit\Framework\TestCase
{
    public $subject;

    protected function setUp(): void
    {
        $this->subject = new \Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule29();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('ganti', $this->subject->disambiguate('pengganti'));
        self::assertEquals('hajar', $this->subject->disambiguate('penghajar'));
        self::assertEquals('qasar', $this->subject->disambiguate('pengqasar'));
    }
}
