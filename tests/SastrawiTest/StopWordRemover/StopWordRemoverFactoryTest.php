<?php

namespace SastrawiTest\StopWordRemover;

use Sastrawi\StopWordRemover\StopWordRemoverFactory;

class StopWordRemoverFactoryTest extends \PHPUnit\Framework\TestCase
{
    protected $factory;

    public function setUp(): void
    {
        $this->factory = new StopWordRemoverFactory();
    }

    public function testCreateStopWordRemover(): void
    {
        $this->assertInstanceOf(
            \Sastrawi\StopWordRemover\StopWordRemover::class,
            $this->factory->createStopWordRemover()
        );
    }
}
