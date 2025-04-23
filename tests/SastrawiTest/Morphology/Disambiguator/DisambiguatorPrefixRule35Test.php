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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule35;

/**
 * Disambiguate Prefix Rule 35 (CS additional rules)
 * Rule 35 : terC1erC2 -> ter-C1erC2 where C1  !==  {r}
 */

final class DisambiguatorPrefixRule35Test extends TestCase
{
    public DisambiguatorPrefixRule35 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule35();
    }

    public function testDisambiguate(): void
    {
        self::assertSame('percaya', $this->subject->disambiguate('terpercaya'));
    }
}
