<?php

declare(strict_types=1);

namespace SastrawiTest\Stemmer;

use Sastrawi\Stemmer\StemmerFactory;

final class StemmerFactoryTest extends \PHPUnit\Framework\TestCase
{
    private \Sastrawi\Stemmer\StemmerFactory $factory;

    public function setUp(): void
    {
        $this->factory = new StemmerFactory();
    }

    public function testCreateStemmerReturnStemmer(): void
    {
        $stemmer = $this->factory->createStemmer();

        $this->assertNotNull($stemmer);
        $this->assertInstanceOf(\Sastrawi\Stemmer\StemmerInterface::class, $stemmer);
    }
}
