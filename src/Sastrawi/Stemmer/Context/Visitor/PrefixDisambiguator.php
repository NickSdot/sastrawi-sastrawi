<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Morphology\Disambiguator\DisambiguatorInterface;

class PrefixDisambiguator extends AbstractDisambiguatePrefixRule implements VisitorInterface
{
    /** @param list<DisambiguatorInterface> $disambiguators */
    public function __construct(array $disambiguators)
    {
        $this->addDisambiguators($disambiguators);
    }
}
