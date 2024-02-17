<?php

$dir = scandir(__DIR__);
var_dump($dir);
echo '<br/>';

var_dump(is_dir($dir[3]));

// rmdir() remove directory, mkdir() add directory

// file_exists() checks the existance of a file
// filesize , file_put_contents put content into a file
//
// some functions like filesize cache result but you can use clearstatcache to ensure you get the latest result

$file = fopen('txt', 'r');  // to read content of file
while (($line = fgets($file)) !== false) {
    echo $line.'<br/>';
}

fclose($file);

// gets and stores the content of a file in file_get_contents() into a string
