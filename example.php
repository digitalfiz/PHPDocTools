<?php

define('BASE', __DIR__);

// Give a friendly message to those who just download and try to run :D
if (!is_file(__DIR__."/vendor/autoload.php")) {
    // Yes that is fancy colors around [ERROR] :P
    die("\n\033[0;31m[ERROR]\033[0m Please run composer install before trying to use this file.\n\n");
}
require BASE."/vendor/autoload.php";



//$file = new DocTools\Loaders\JSON('example_files/example.json');
$file = new DocTools\Loaders\CSV('example_files/example.csv');


print_r($file->getContents());