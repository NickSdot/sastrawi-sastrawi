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

/**
 * Remove Inflectional particle.
 *
 * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval”. page 60
 * @link http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
 */
class RemoveInflectionalParticle implements VisitorInterface
{
    public function visit(ContextInterface $context): void
    {
        if ($context->getCurrentWord() === $result = $this->remove($context->getCurrentWord())) {
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
            'P'
        );

        $context->addRemoval($removal);
        $context->setCurrentWord($result);

    }

    /**
     * Remove inflectional particle : lah|kah|tah|pun
     */
    public function remove(string $word): string
    {
        if (null === $result = preg_replace('/-*(lah|kah|tah|pun)$/', '', $word, 1)) {
            throw new \RuntimeException("The word '{$word}' does not exist");
        }

        return $result;
    }
}
