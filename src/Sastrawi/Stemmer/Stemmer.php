<?php

declare(strict_types=1);

/**
 * Sastrawi (https://github.com/sastrawi/sastrawi)
 *
 * @link      http://github.com/sastrawi/sastrawi for the canonical source repository
 * @license   https://github.com/sastrawi/sastrawi/blob/master/LICENSE The MIT License (MIT)
 */

namespace Sastrawi\Stemmer;

use Sastrawi\Dictionary\DictionaryInterface;
use Sastrawi\Stemmer\Context\Context;
use Sastrawi\Stemmer\Context\Visitor\VisitorProvider;

use function explode;
use function implode;
use function in_array;
use function preg_match;
use function str_contains;

/**
 * Indonesian Stemmer.
 * Nazief & Adriani, CS Stemmer, ECS Stemmer, Improved ECS.
 *
 * @link https://github.com/sastrawi/sastrawi/wiki/Resources
 */
final class Stemmer implements StemmerInterface
{
    /**
     * Visitor provider
     */
    protected VisitorProvider $visitorProvider;

    public function __construct(
        /** The dictionary containing root words */
        protected DictionaryInterface $dictionary
    ) {
        $this->visitorProvider = new VisitorProvider();
    }

    public function getDictionary(): DictionaryInterface
    {
        return $this->dictionary;
    }

    /**
     * Stem a text string to its common stem form.
     *
     * @param string $text the text string to stem, e.g : memberdayakan pembangunan
     *
     * @return string common stem form, e.g : daya bangun
     */
    public function stem(string $text): string
    {
        $normalizedText = Filter\TextNormalizer::normalizeText($text);

        $words = explode(' ', $normalizedText);
        $stems = [];

        foreach ($words as $word) {
            $stems[] = $this->stemWord($word);
        }

        return implode(' ', $stems);
    }

    /**
     * Stem a word to its common stem form.
     *
     * @param string $word the word to stem, e.g : memberdayakan
     *
     * @return string common stem form, e.g : daya
     */
    protected function stemWord(string $word): string
    {
        if ($this->isPlural($word)) {
            return $this->stemPluralWord($word);
        }

        return $this->stemSingularWord($word);
    }

    protected function isPlural(string $word): bool
    {
        // -ku|-mu|-nya
        // nikmat-Ku, etc
        if (1 === preg_match('/^(.*)-(ku|mu|nya|lah|kah|tah|pun)$/', $word, $words)) {
            return str_contains($words[1], '-');
        }

        return str_contains($word, '-');
    }

    /**
     * Stem a plural word to its common stem form.
     * Asian J. (2007) “Effective Techniques for Indonesian Text Retrieval” page 76-77.
     *
     * @param string $plural the word to stem, e.g : bersama-sama
     *
     * @return string common stem form, e.g : sama
     * @link   http://researchbank.rmit.edu.au/eserv/rmit:6312/Asian.pdf
     */
    protected function stemPluralWord(string $plural): string
    {
        preg_match('/^(.*)-(.*)$/', $plural, $words);

        if (!isset($words[1]) || !isset($words[2])) {
            return $plural;
        }

        // malaikat-malaikat-nya -> malaikat malaikat-nya
        $suffix = $words[2];

        if (
            true === in_array($suffix, [ 'ku', 'mu', 'nya', 'lah', 'kah', 'tah', 'pun' ], true)
            && 1 === preg_match('/^(.*)-(.*)$/', $words[1], $words)) {
            $words[2] .= '-' . $suffix;
        }

        // berbalas-balasan -> balas
        $rootWord1 = $this->stemSingularWord($words[1]);
        $rootWord2 = $this->stemSingularWord($words[2]);

        // meniru-nirukan -> tiru
        if (!$this->dictionary->contains($words[2]) && $rootWord2 === $words[2]) {
            $rootWord2 = $this->stemSingularWord('me' . $words[2]);
        }

        if ($rootWord1 === $rootWord2) {
            return $rootWord1;
        }

        return $plural;
    }

    /**
     * Stem a singular word to its common stem form.
     *
     * @param string $word the word to stem, e.g : mengalahkan
     *
     * @return string common stem form, e.g : kalah
     */
    protected function stemSingularWord(string $word): string
    {
        $context = new Context($word, $this->dictionary, $this->visitorProvider);
        $context->execute();

        return $context->getResult();
    }
}
