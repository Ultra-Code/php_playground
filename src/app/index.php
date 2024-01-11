<?php
/**
 *  Index File Doc Comment
 *
 * @category Learning
 *
 * @author    Bernard Assan <malpha@animosusoft.com>
 * @copyright 2015 animosusoft, Inc. All rights reserved
 * @license   MIT License
 *
 * @version GIT:0.1.0
 *
 * @link  github.com/Ultra-Code
 * @since 2023-12-18
 *
 * @phpversion 8.3.0
 *
 * @description Learning php for backend development
 */

declare(strict_types=1);

namespace Ultracode\Test;

// require 'index.php'

$name_a = 'hello world\n';
echo $name_a.'<br/>';
define('STATUS', 'paid');

$a = 1;
$b = &$a;
$a = 3;

echo "{$b}\n";
echo STATUS;

const NEWCONST = "\nI'm const\n";

echo NEWCONST;

$paid = 'PAID';
define('STATUS_'.$paid, $paid);
echo nl2br(STATUS_PAID.'<br/>');

echo PHP_VERSION;

$$paid = "\nVariable Variable of paid\n";
echo "{$$paid}";

echo '<br/>';

echo gettype($paid);
// var_dump($paid);
function name(int $x): int
{
    return $x;
}

// name('a');
$cast = (int) 'a';
echo gettype($cast);
$a = ['true' => 'This is true'];
echo $a['true'];

$null_val = null;
$null_val = $null_val ?? 'hello';

echo $null_val;

$users = [
    'name' => 'Gio',
    'email' => 'g.b@sml.com',
    'skills' => ['c++', 'zig', 'rust'],
];

foreach ($users as $key => $value) {
    if (is_array($value)) {
        echo implode($value);
    }
    echo $key.': '.json_encode($value);
}

switch ($users) {
    case 'value':
        // code...
        break;

    default:
        // code...
        break;
}
$numbers = [1, 2];
$got_it = match ($numbers[1]) {
    1 => 'one',
    2,3 => 'two and three',
    default => 'get yourself a number'
};

echo $got_it;

function sum(int $x, int|float ...$rest): int|float
{
    return $x + array_sum($rest);
}

sum(3, 4, 5, 6);

$anonymous = function (float $name) use ($numbers): float {
    return $name + array_sum($numbers);
};

$do_something = function (callable $func): int {
    return $func(3);
};

function callback(int $arg): int
{
    return $arg;
}

$val = array_map(fn ($element) => $element * 2, [1, 2, 3, 4]);
echo $val;
