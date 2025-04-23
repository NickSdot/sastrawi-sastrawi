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

use function mb_strlen;

final class DontStemShortWord implements VisitorInterface
{
    public function visit(ContextInterface $context): void
    {
        if ($this->isShortWord($context->getCurrentWord())) {
            $context->stopProcess();
        }
    }

    protected function isShortWord(string $word): bool
    {
        return (mb_strlen($word) <= 3);
    }
}
