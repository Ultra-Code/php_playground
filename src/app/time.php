<?php

namespace Ultracode\Test;

require 'utils.php';

echo time().'<br/>';

echo date('M/D/Y g:ia').'<br/>';

echo date_default_timezone_get().'<br/>';

$date = date('M/D/Y g:ia', strtotime('2011-11-11 11:11:11')).'<br/>';

echo '<pre>';
print_r(date_parse($date));
echo '</pre>';

echo '<pre>';
print_r(date_parse_from_format('M/D/Y g:ia', $date));
echo '</pre>';

$items = ['a' => 1, 'b' => 2, 'c' => 3, 'd' => 4, 'e' => 5, 'f' => '6'];
pretty_print(array_chunk($items, 2));
pretty_print(array_chunk($items, 2, true));

$array = [1, 2, 3, 4, 5, 6, 7, 8, 9];
// keys aren't reindexed so there might be gaps in the keys
$even = array_filter($array, fn ($element) => $element % 2 === 0, ARRAY_FILTER_USE_BOTH);
pretty_print($even);
// to reindexed the array
$even = array_values($even);
pretty_print($even);

// array_search() or in_array() can be use to search for an element in an array

// array_diff in elements in the first array that aren't in any of the rest of the arrays

// asort fn ksort fn usort fn for sorting arrays
// rsort($array) or sort($array, SORT_DESC) can also be used
usort($array, fn ($left, $right) => $right <=> $left);  // reverse sorting
pretty_print($array);

$array = [1, 2, [3, 4]];
[$a, $b, [$c, $d]] = $array;
echo $a.' , '.$b.' , '.$c.' , '.$d;
