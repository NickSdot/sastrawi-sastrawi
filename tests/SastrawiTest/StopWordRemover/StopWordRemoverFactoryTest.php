<?php

declare(strict_types=1);

namespace SastrawiTest\StopWordRemover;

use PHPUnit\Framework\TestCase;
use Sastrawi\StopWordRemover\StopWordRemover;
use Sastrawi\StopWordRemover\StopWordRemoverFactory;

final class StopWordRemoverFactoryTest extends TestCase
{
    private StopWordRemoverFactory $factory;

    protected function setUp(): void
    {
        $this->factory = new StopWordRemoverFactory();
    }

    public function testCreateStopWordRemover(): void
    {
        self::assertInstanceOf(StopWordRemover::class, $this->factory->createStopWordRemover());
    }
}
