# StringType Theory

Objective multi-byte string handling in PHP.

## public API


### `StringTheory\Type\StringType`

The basic string interface.

### `StringTheory\Type\MbString`

Implementation of `StringType` for multi-byte strings. Default encoding is set to `UTF-8`.

Example:
```php

use StringTheory\Type;

$string = new Type\MbString( '苍天有' );

echo $string[ 0 ]; // 苍
echo $string[ 2 ]; // 有 
var_dump( isset( $string[ 3 ] ) ); // false
```

### `StringTheory\Model\Scanner`

Basic scanner interface that allows a character sequential iteration of a string.

### `StringTheory\Model\MbScanner`

Implementation of the `Scanner` interface for multi-byte strings. Default
encoding is set to `UTF-8`.

Example:

```php
use StringTheory\Model;

$scanner = new Model\MbScanner( 'abc' );

echo $scanner->current(); // a

$scanner->next();
$scanner->next();
echo $scanner->current(); // c

$scanner->previous();
echo $scanner->current(); // b
```