<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer\Context\Visitor;

use Sastrawi\Stemmer\Context\ContextInterface;
use Sastrawi\Stemmer\Context\Removal;

use function preg_replace;
use function sprintf;

/**
 * Remove Derivational Suffix.
 *
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 61
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
final class RemoveDerivationalSuffix implements VisitorInterface
{
    public function visit(ContextInterface $context): void
    {
        if ($context->getCurrentWord() === $result = $this->removeSuffix($context->getCurrentWord())) {
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
            'DS'
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);
    }

    /**
     * Remove derivational suffix
     * Original rule : i|kan|an
     * Added the adopted foreign suffix rule : is|isme|isasi
     *
     * @return string word after its derivational suffix removed
     */
    public function removeSuffix(string $word): string
    {
        if (null === $result = preg_replace('/(is|isme|isasi|i|kan|an)$/', '', $word, 1)) {
            throw new \RuntimeException(sprintf("The word '%s' does not exist", $word));
        }

        return $result;
    }
}
