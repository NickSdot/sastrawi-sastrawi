<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */
namespace Sastrawi\Stemmer\Context;

use Sastrawi\Dictionary\DictionaryInterface;

/**
 * Stemming Context Interface
 *
 * @since  0.1.0
 * @author Andy Librian <andylibrian@gmail.com>
 */
interface ContextInterface
{
    public function getOriginalWord(): string;

    public function setCurrentWord(string $word): void;

    public function getCurrentWord(): string;

    public function getDictionary(): DictionaryInterface;

    public function stopProcess(): void;

    public function processIsStopped(): bool;

    public function addRemoval(RemovalInterface $removal): void;

    /** @return RemovalInterface[] */
    public function getRemovals(): array;
}
