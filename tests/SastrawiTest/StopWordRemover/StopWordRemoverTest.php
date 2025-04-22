<?php

namespace SastrawiTest\StopWordRemover;

use Sastrawi\StopWordRemover\StopWordRemover;
use Sastrawi\Dictionary\ArrayDictionary;

class StopWordRemoverTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->dictionary = new ArrayDictionary(array('di', 'ke'));
        $this->stopWordRemover = new StopWordRemover($this->dictionary);
    }

    public function testGetDictionaryPreserveInstance(): void
    {
        $this->assertSame($this->dictionary, $this->stopWordRemover->getDictionary());
    }

    public function testRemoveStopWord(): void
    {
        $this->assertEquals('pergi sekolah', $this->stopWordRemover->remove('pergi ke sekolah'));
        $this->assertEquals('makan rumah', $this->stopWordRemover->remove('makan di rumah'));
    }
}
