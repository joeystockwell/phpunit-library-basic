<?php
declare(strict_types=1);

use PHPUnit\Framework\TestCase;
use phpunit_library_basic\classes\Dog;

final class DogTest extends TestCase
{
	public function testCanBeCreatedFromValidDogBreed(): void
	{
		$this->assertInstanceOf(
			Dog::class,
			Dog::fromString('aaa')
		);
	}

	public function testCannotBeCreatedFromInvalidDogBreed(): void
	{
		$this->expectException(InvalidArgumentException::class);

		Dog::fromString('invalid');
	}

	public function testCanBeUsedAsString(): void
	{
		$this->assertEquals(
			'bbb',
			Dog::fromString('bbb')
		);
	}
}