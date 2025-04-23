<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer;

use PHPUnit\Framework\TestCase;
use Sastrawi\Stemmer\StemmerFactory;
use Sastrawi\Stemmer\StemmerInterface;

final class StemmerFactoryTest extends TestCase
{
    private StemmerFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new StemmerFactory();
    }

    public function testCreateStemmerReturnStemmer(): void
    {
        $stemmer = $this->factory->createStemmer();

        self::assertNotNull($stemmer); // todo: this is always true, why need it?
        self::assertInstanceOf(StemmerInterface::class, $stemmer);
    }
}
