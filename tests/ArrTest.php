<?php

namespace GulfarazArshad\LaravelArrExtended\Tests;

use GulfarazArshad\LaravelArrExtended\Arr;
use PHPUnit\Framework\TestCase;

class ArrTest extends TestCase
{
	public function test_arr_after(): void
	{
		// Returns next value
		$this->assertSame('b', Arr::after(['a', 'b', 'c'], 'a'));

		// Last element without wrap returns null
		$this->assertNull(Arr::after(['a', 'b', 'c'], 'c'));

		// Last element with wrap returns first
		$this->assertSame('a', Arr::after(['a', 'b', 'c'], 'c', wrap: true));

		// Value not found without wrap returns null
		$this->assertNull(Arr::after(['a', 'b', 'c'], 'z'));

		// Value not found with wrap returns first
		$this->assertSame('a', Arr::after(['a', 'b', 'c'], 'z', wrap: true));

		// Empty array returns null
		$this->assertNull(Arr::after([], 'a'));

		// Strict type check
		$this->assertNull(Arr::after([1, 2, 3], '1'));

		// Associative array
		$this->assertSame('b', Arr::after(['x' => 'a', 'y' => 'b'], 'a'));
	}
}