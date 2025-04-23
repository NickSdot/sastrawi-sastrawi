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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule26a;

/**
 * Disambiguate Prefix Rule 26a
 * Rule 26a : pem{rV|V} -> pe-m{rV|V}
 */
final class DisambiguatorPrefixRule26aTest extends TestCase
{
    public DisambiguatorPrefixRule26a $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule26a();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('milik', $this->subject->disambiguate('pemilik'));
    }
}
