<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use phpunit_library_basic\classes\Price;

final class PriceTest extends TestCase
{
	public function testCanBeCreatedFromValidPrice(): void
	{
		$this->assertInstanceOf(
			Price::class,
			Price::fromFloat(1.25)
		);
	}

	public function testCannotBeCreatedFromInvalidPrice(): void
	{
		$this->expectException(\InvalidArgumentException::class);

		Price::fromFloat(-0.345);
	}

	public function testCorrectPriceCalculation(): void
	{
		$this->assertEquals(
			(float)1.75,
			(float)Price::calculatePrice(1.25)
		);
	}
}