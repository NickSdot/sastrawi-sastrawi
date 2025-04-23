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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule17d;

/**
 * Disambiguate Prefix Rule 17d
 * Rule 17d : mengV -> me-ngV
 */
final class DisambiguatorPrefixRule17dTest extends TestCase
{
    public DisambiguatorPrefixRule17d $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule17d();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('ngerikan', $this->subject->disambiguate('mengerikan'));
    }
}
