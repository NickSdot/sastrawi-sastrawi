<?php

namespace SastrawiTest\StopWordRemover;

use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class StopWordRemoverFactoryTest extends \PHPUnit\Framework\TestCase
{
    protected $factory;

    public function setUp()
    {
        $this->factory = new StopWordRemoverFactory();
    }

    public function testCreateStopWordRemover(): void
    {
        $this->assertInstanceOf(
            'Sastrawi\StopWordRemover\StopWordRemover',
            $this->factory->createStopWordRemover()
        );
    }
}
