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
use Sastrawi\Stemmer\Context\Visitor\VisitorInterface;
use Sastrawi\Stemmer\Context\Visitor\VisitableInterface;
use Sastrawi\Stemmer\ConfixStripping;
use Sastrawi\Stemmer\Context\Visitor\VisitorProvider;

/**
 * Stemming Context using Nazief and Adriani, CS, ECS, Improved ECS
 */
class Context implements ContextInterface, VisitableInterface
{
    protected string $currentWord;

    protected bool $processIsStopped = false;

    /**  @var \Sastrawi\Stemmer\Context\RemovalInterface[]  */
    protected array $removals = [];

    /** @var \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[]  */
    protected array $visitors = [];

    /**  @var \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[]  */
    protected array $suffixVisitors = [];

    /** @var \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[]  */
    protected array $prefixVisitors = [];

    protected string $result;

    public function __construct(
        protected string $originalWord,
        protected DictionaryInterface $dictionary,
        protected VisitorProvider $visitorProvider
    ) {
        $this->currentWord  = $this->originalWord;

        $this->initVisitors();
    }

    protected function initVisitors(): void
    {
        $this->visitors       = $this->visitorProvider->getVisitors();
        $this->suffixVisitors = $this->visitorProvider->getSuffixVisitors();
        $this->prefixVisitors = $this->visitorProvider->getPrefixVisitors();
    }

    /**
     * @api
     */
    public function setDictionary(DictionaryInterface $dictionary): void
    {
        $this->dictionary = $dictionary;
    }

    public function getDictionary(): DictionaryInterface
    {
        return $this->dictionary;
    }

    public function getOriginalWord(): string
    {
        return $this->originalWord;
    }

    public function setCurrentWord(string $word): void
    {
        $this->currentWord = $word;
    }

    public function getCurrentWord(): string
    {
        return $this->currentWord;
    }

    public function stopProcess(): void
    {
        $this->processIsStopped = true;
    }

    public function processIsStopped(): bool
    {
        return $this->processIsStopped;
    }

    public function addRemoval(RemovalInterface $removal): void
    {
        $this->removals[] = $removal;
    }

    public function getRemovals(): array
    {
        return $this->removals;
    }

    public function getResult(): string
    {
        return $this->result;
    }

    /**
     * Execute stemming process; the result can be retrieved with getResult()
     */
    public function execute(): void
    {
        // step 1 - 5
        $this->startStemmingProcess();

        // step 6
        $this->result = $this->dictionary->contains($this->getCurrentWord()) ? $this->getCurrentWord() : $this->originalWord;
    }

    protected function startStemmingProcess(): void
    {
        // step 1
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $this->acceptVisitors($this->visitors);

        // todo: PhpStan is of the opinion that this is always false; which is not correct
        if (true === $this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        $csPrecedenceAdjustmentSpecification = new ConfixStripping\PrecedenceAdjustmentSpecification();

        /*
         * Confix Stripping
         * Try to remove prefix before suffix if the specification is met
         */
        if ($csPrecedenceAdjustmentSpecification->isSatisfiedBy($this->getOriginalWord())) {
            // step 4, 5
            $this->removePrefixes();
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }

            // step 2, 3
            $this->removeSuffixes();
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }

            // if the trial is failed, restore the original word
            // and continue to normal rule precedence (suffix first, prefix afterward)
            $this->setCurrentWord($this->originalWord);
            $this->removals = [];
        }

        // step 2, 3
        $this->removeSuffixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // step 4, 5
        $this->removePrefixes();
        if ($this->dictionary->contains($this->getCurrentWord())) {
            return;
        }

        // ECS loop pengembalian akhiran
        $this->loopPengembalianAkhiran();
    }

    protected function removePrefixes(): void
    {
        for ($i = 0; $i < 3; ++$i) {
            $this->acceptPrefixVisitors($this->prefixVisitors);
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }
        }
    }

    protected function removeSuffixes(): void
    {
        $this->acceptVisitors($this->suffixVisitors);
    }

    public function accept(VisitorInterface $visitor): void
    {
        $visitor->visit($this);
    }

    /**
     * @param \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[] $visitors
     */
    protected function acceptVisitors(array $visitors): ?string
    {
        foreach ($visitors as $visitor) {
            $this->accept($visitor);

            if ($this->getDictionary()->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            }

            if ($this->processIsStopped()) {
                return $this->getCurrentWord();
            }
        }

        return null;
    }

    /**
     * @param \Sastrawi\Stemmer\Context\Visitor\VisitorInterface[] $visitors
     */
    protected function acceptPrefixVisitors(array $visitors): ?string
    {
        $removalCount = count($this->removals);
        foreach ($visitors as $visitor) {
            $this->accept($visitor);

            if ($this->getDictionary()->contains($this->getCurrentWord())) {
                return $this->getCurrentWord();
            }

            if ($this->processIsStopped()) {
                return $this->getCurrentWord();
            }

            if (count($this->removals) > $removalCount) {
                return null;
            }
        }

        return null;
    }

    /**
     * ECS Loop Pengembalian Akhiran
     */
    public function loopPengembalianAkhiran(): void
    {
        // restore prefix to form [DP+[DP+[DP]]] + Root word
        $this->restorePrefix();

        $removals = $this->removals;
        $reversedRemovals = array_reverse($removals);
        $currentWord = $this->getCurrentWord();

        foreach ($reversedRemovals as $removal) {
            if (!$this->isSuffixRemoval($removal)) {
                continue;
            }

            if ($removal->getRemovedPart() === 'kan') {
                $this->setCurrentWord($removal->getResult() . 'k');

                // step 4, 5
                $this->removePrefixes();
                if ($this->dictionary->contains($this->getCurrentWord())) {
                    return;
                }

                $this->setCurrentWord($removal->getResult() . 'kan');
            } else {
                $this->setCurrentWord($removal->getSubject());
            }

            // step 4, 5
            $this->removePrefixes();
            if ($this->dictionary->contains($this->getCurrentWord())) {
                return;
            }

            $this->removals = $removals;
            $this->setCurrentWord($currentWord);
        }
    }

    /**
     * Check whether the removed part is a suffix
     */
    protected function isSuffixRemoval(RemovalInterface $removal): bool
    {
        if ($removal->getAffixType() === 'DS') {
            return true;
        }

        if ($removal->getAffixType() === 'PP') {
            return true;
        }

        return $removal->getAffixType() === 'P';
    }

    /**
     * Restore prefix to proceed with ECS loop pengembalian akhiran
     */
    public function restorePrefix(): void
    {
        foreach ($this->removals as $removal) {
            if ($removal->getAffixType() === 'DP') {
                // return the word before pre-coding (the subject of first prefix removal)
                $this->setCurrentWord($removal->getSubject());
                break;
            }
        }

        foreach ($this->removals as $i => $removal) {
            if ($removal->getAffixType() === 'DP') {
                unset($this->removals[$i]);
            }
        }
    }
}
