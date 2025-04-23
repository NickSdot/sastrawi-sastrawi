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
use Sastrawi\Stemmer\Context\ContextInterface;
use Sastrawi\Stemmer\Context\Removal;

use function preg_replace;
use function sprintf;

abstract class AbstractDisambiguatePrefixRule implements VisitorInterface
{
    /** @var list<DisambiguatorInterface> */
    protected array $disambiguators = [];

    public function visit(ContextInterface $context): void
    {
        $result = null;

        foreach ($this->disambiguators as $disambiguator) {

            if (null === $result = $disambiguator->disambiguate($context->getCurrentWord())) {
                continue;
            }

            if ($context->getDictionary()->contains($result)) {
                break;
            }
        }

        if (null === $result) {
            return;
        }

        $removedPart = preg_replace(sprintf('/%s/', $result), '', $context->getCurrentWord(), 1);

        if (null === $removedPart) {
            throw new \RuntimeException('Could not get removed word part.');
        }

        $removal = new Removal(
            $this,
            $context->getCurrentWord(),
            $result,
            $removedPart,
            'DP'
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);
    }

    /** @param list<DisambiguatorInterface> $disambiguators */
    public function addDisambiguators(array $disambiguators): void
    {
        foreach ($disambiguators as $disambiguator) {
            $this->addDisambiguator($disambiguator);
        }
    }

    public function addDisambiguator(DisambiguatorInterface $disambiguator): void
    {
        $this->disambiguators[] = $disambiguator;
    }
}
