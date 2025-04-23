<?php

declare(strict_types=1);

namespace SastrawiTest\Morphology;

use PHPUnit\Framework\TestCase;
use Sastrawi\Morphology\InvalidAffixPairSpecification;

final class InvalidAffixPairSpecificationTest extends TestCase
{
    public InvalidAffixPairSpecification $specification;

    protected function setUp(): void
    {
        $this->specification = new InvalidAffixPairSpecification();
    }

    /**
     * Test contains invalid affix pair ber-i|di-an|ke-i|ke-kan|me-an|ter-an|per-an
     */
    public function testContainsInvalidAffixPair(): void
    {
        self::assertFalse($this->specification->isSatisfiedBy('memberikan'));
        self::assertFalse($this->specification->isSatisfiedBy('ketahui'));

        self::assertTrue($this->specification->isSatisfiedBy('berjatuhi'));
        self::assertTrue($this->specification->isSatisfiedBy('dipukulan'));
        self::assertTrue($this->specification->isSatisfiedBy('ketiduri'));
        self::assertTrue($this->specification->isSatisfiedBy('ketidurkan'));
        self::assertTrue($this->specification->isSatisfiedBy('menduaan'));
        self::assertTrue($this->specification->isSatisfiedBy('terduaan'));
        self::assertTrue($this->specification->isSatisfiedBy('perkataan')); // wtf?
    }
}
