<?php

declare(strict_types=1);

namespace SastrawiTest\StopWordRemover;

use PHPUnit\Framework\TestCase;
use Sastrawi\StopWordRemover\StopWordRemover;
use Sastrawi\Dictionary\ArrayDictionary;

final class StopWordRemoverTest extends TestCase
{
    public ArrayDictionary $dictionary;

    public StopWordRemover $stopWordRemover;

    protected function setUp(): void
    {
        $this->dictionary = new ArrayDictionary(['di', 'ke']);
        $this->stopWordRemover = new StopWordRemover($this->dictionary);
    }

    public function testGetDictionaryPreserveInstance(): void
    {
        self::assertSame($this->dictionary, $this->stopWordRemover->getDictionary());
    }

    public function testRemoveStopWord(): void
    {
        self::assertEquals('pergi sekolah', $this->stopWordRemover->remove('pergi ke sekolah'));
        self::assertEquals('makan rumah', $this->stopWordRemover->remove('makan di rumah'));
    }
}
