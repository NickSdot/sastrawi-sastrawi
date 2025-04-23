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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule17c;

/**
 * Disambiguate Prefix Rule 17c
 * Rule 17c : mengV -> mengV- where V = 'e'
 */
final class DisambiguatorPrefixRule17cTest extends TestCase
{
    public DisambiguatorPrefixRule17c $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule17c();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('cas', $this->subject->disambiguate('mengecas'));
        self::assertEquals('cat', $this->subject->disambiguate('mengecat'));
    }
}
