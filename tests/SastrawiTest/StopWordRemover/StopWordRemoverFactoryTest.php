<?php

declare(strict_types=1);

namespace SastrawiTest\StopWordRemover;

use Sastrawi\StopWordRemover\StopWordRemoverFactory;

final class StopWordRemoverFactoryTest extends \PHPUnit\Framework\TestCase
{
    private \Sastrawi\StopWordRemover\StopWordRemoverFactory $factory;

    protected function setUp(): void
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
