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
use Sastrawi\Morphology\Disambiguator\DisambiguatorPrefixRule3;

/**
* Disambiguate Prefix Rule 3
* Rule 3 : berCAerV -> ber-CAerV where C  !==  'r'
*
*/
final class DisambiguatorPrefixRule3Test extends TestCase
{
    public DisambiguatorPrefixRule3 $subject;

    protected function setUp(): void
    {
        $this->subject = new DisambiguatorPrefixRule3();
    }

    public function testDisambiguate(): void
    {
        self::assertEquals('hierarki', $this->subject->disambiguate('berhierarki'));
    }
}
