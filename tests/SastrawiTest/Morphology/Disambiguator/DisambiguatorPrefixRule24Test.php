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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule24;

/**
 * Disambiguate Prefix Rule 24
 * Rule 24 : perCAerV -> per-CAerV where C  !==  'r'
 */
final class DisambiguatorPrefixRule24Test extends TestCase
{
    public DisambiguatorPrefixRule24 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule24();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('daerah', $this->subject->disambiguate('perdaerah'));
    }
}
