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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule19;

/**
 * Disambiguate Prefix Rule 19
 * Original Rule 19 : mempV -> mem-pV where V  !==  'e'
 * Modified Rule 19 by ECS : mempA -> mem-pA where A  !==  'e' in order to stem memproteksi
 */
final class DisambiguatorPrefixRule19Test extends TestCase
{
    public DisambiguatorPrefixRule19 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule19();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('proteksi', $this->subject->disambiguate('memproteksi'));
        self::assertEquals('patroli', $this->subject->disambiguate('mempatroli'));
    }
}
