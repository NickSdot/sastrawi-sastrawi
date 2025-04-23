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
 * Remove Plain Prefix.
 *
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 61
 *
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
final class RemovePlainPrefix implements VisitorInterface
{
    public function visit(ContextInterface $context): void
    {
        if ($context->getCurrentWord() === $result = $this->remove($context->getCurrentWord())) {
            return;
        }

        $removedPart = preg_replace(
            sprintf('/%s/', $result),
            '',
            $context->getCurrentWord(),
            1
        );

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

    /**
     * Remove plain prefix : di|ke|se
     */
    public function remove(string $word): string
    {
        if (null === $result = preg_replace('/^(di|ke|se)/', '', $word, 1)) {
            throw new \RuntimeException(sprintf("The word '%s' does not exist", $word));
        }

        return $result;
    }
}
