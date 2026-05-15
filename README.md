# Laravel Arr Extended

[![Latest Version on Packagist](https://img.shields.io/packagist/v/gulfaraz-arshad/laravel-arr-extended.svg?style=flat-square)](https://packagist.org/packages/gulfaraz-arshad/laravel-arr-extended)
[![Total Downloads](https://img.shields.io/packagist/dt/gulfaraz-arshad/laravel-arr-extended.svg?style=flat-square)](https://packagist.org/packages/gulfaraz-arshad/laravel-arr-extended)
[![License](https://img.shields.io/packagist/l/gulfaraz-arshad/laravel-arr-extended.svg?style=flat-square)](https://packagist.org/packages/gulfaraz-arshad/laravel-arr-extended)

Extended Arr helpers for Laravel — filling the small gaps that Laravel's built-in `Arr` class doesn't cover.

## Why This Package?

Laravel's `Arr` class provides helpful methods like `Arr::first()` and `Arr::last()` — but there's no clean way to get the value *after* a given value in an array. This package fills that gap.

> I originally submitted this as a PR to the Laravel framework. Taylor decided to keep the framework minimal, so I released it as a standalone package instead.

## Requirements

- PHP 8.1+
- Laravel 11.x or 12.x

## Installation

```bash
composer require gulfaraz-arshad/laravel-arr-extended
```

## Available Methods

### `Arr::after()`

Retrieves the value after a given value in an array.

```php
use GulfarazArshad\LaravelArrExtended\Arr;

Arr::after(array $array, mixed $value, bool $wrap = false): mixed
```

#### Basic Usage

```php
// Returns the value after 'a'
Arr::after(['a', 'b', 'c'], 'a'); // 'b'

// Last element returns null by default
Arr::after(['a', 'b', 'c'], 'c'); // null

// Value not found returns null
Arr::after(['a', 'b', 'c'], 'z'); // null

// Empty array returns null
Arr::after([], 'a'); // null
```

#### With `wrap` Flag

```php
// Last element wraps to first
Arr::after(['a', 'b', 'c'], 'c', wrap: true); // 'a'

// Value not found with wrap returns first element
Arr::after(['a', 'b', 'c'], 'z', wrap: true); // 'a'
```

#### Associative Arrays

```php
// Works with associative arrays
Arr::after(['x' => 'a', 'y' => 'b'], 'a'); // 'b'
```

#### Type Safety

```php
// Strict comparison — no type juggling
Arr::after([1, 2, 3], '1'); // null (string !== integer)
Arr::after([1, 2, 3], 1);   // 2 ✅
```

## Real World Examples

**Step wizard:**
```php
$steps = ['personal', 'address', 'payment', 'confirm'];

$next = Arr::after($steps, 'payment'); // 'confirm'
$done = Arr::after($steps, 'confirm'); // null — wizard complete!
```

**Carousel navigation:**
```php
$slides = ['home', 'about', 'contact'];

$next = Arr::after($slides, 'contact', wrap: true); // 'home'
```

**Round-robin load balancing:**
```php
$servers = ['server1', 'server2', 'server3'];

$next = Arr::after($servers, 'server3', wrap: true); // 'server1'
```

**Day of week rotation:**
```php
$days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];

$next = Arr::after($days, 'Sun', wrap: true); // 'Mon'
```

## Testing

```bash
./vendor/bin/phpunit
```

## Contributing

Contributions are welcome! If you have ideas for other array helpers that are missing from Laravel, feel free to open an issue or submit a PR.

## Credits

- [Gulfaraz Arshad](https://github.com/gulfaraz-arshad)
- [Original Laravel PR #60081](https://github.com/laravel/framework/pull/60081)

## License

MIT
