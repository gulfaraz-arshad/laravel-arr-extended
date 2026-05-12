# Laravel Arr Extended

Extended Arr helpers for Laravel including `Arr::after()`.

## Installation

```bash
composer require gulfaraz-arshad/laravel-arr-extended
```

## Usage

```php
use GulfarazArshad\LaravelArrExtended\Arr;

// Basic usage
Arr::after(['a', 'b', 'c'], 'a'); // 'b'

// Last element returns null by default
Arr::after(['a', 'b', 'c'], 'c'); // null

// Wrap around with flag
Arr::after(['a', 'b', 'c'], 'c', wrap: true); // 'a'

// Value not found
Arr::after(['a', 'b', 'c'], 'z'); // null

// Value not found with wrap
Arr::after(['a', 'b', 'c'], 'z', wrap: true); // 'a'

// Associative arrays
Arr::after(['x' => 'a', 'y' => 'b'], 'a'); // 'b'
```

## License

MIT
