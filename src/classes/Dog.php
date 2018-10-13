<?php
declare(strict_types=1);

namespace phpunit_library_basic\classes;

final class Dog
{
	const BREEDS = [
		'aaa',
		'bbb',
		'ccc'
	];

	private $breed;

	private function __construct(string $breed)
	{
		$this->ensureIsValidBreed($breed);

		$this->breed = $breed;
	}

	public static function fromString(string $breed): self
	{
		return new self($breed);
	}

	public function __toString(): string
	{
		return $this->breed;
	}

	private function ensureIsValidBreed(string $breed): void
	{
		if (!in_array($breed, static::BREEDS)) {
			throw new \InvalidArgumentException(
				sprintf(
					'"%s" is not a valid dog breed',
					$breed
				)
			);
		}
	}
}