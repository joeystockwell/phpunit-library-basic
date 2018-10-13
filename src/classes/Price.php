<?php
declare(strict_types=1);

namespace phpunit_library_basic\classes;

final class Price
{
	const TAX = 1.2;

	const MARKUP = 1.2;

	private $price;

	private function __construct(float $price)
	{
		$this->price = $this->calculatePrice($price);
	}

	public static function fromFloat(float $price): self
	{
		if ($price <= 0) {
			throw new \InvalidArgumentException();
		}

		return new self($price);
	}

	public function __toString(): string
	{
		return (string) $this->price;
	}

	public function calculatePrice(float $price): float
	{
		$multiplier = (static::TAX + static::MARKUP) - 1;

		return (float) round(($price * $multiplier), 2);
	}
}