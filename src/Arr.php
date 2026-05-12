<?php

namespace GulfarazArshad\LaravelArrExtended;

class Arr extends \Illuminate\Support\Arr
{
	/**
	 * Retrieve the value after the given value in the array.
	 *
	 * @template TKey of array-key
	 * @template TValue
	 *
	 * @param  array<TKey, TValue>  $array
	 * @param  TValue  $value
	 * @param  bool  $wrap
	 * @return TValue|null
	 */
	public static function after(array $array, mixed $value, bool $wrap = false): mixed
	{
		if (empty($array)) {
			return null;
		}

		$values = array_values($array);
		$index = array_search($value, $values, true);

		if ($index === false) {
			return $wrap ? $values[0] : null;
		}

		$isLast = $index === count($values) - 1;

		if ($isLast) {
			return $wrap ? $values[0] : null;
		}

		return $values[$index + 1];
	}
}