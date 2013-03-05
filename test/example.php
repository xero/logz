<?php

echo('<h1>logz test</h1>');
require_once('../src/logz.php');
$logz = new logz(getcwd().'/logs/', 'test.log');
$logz->write('testing testing 123...');
$logz->write('this is a fake log message.');
$logz->write('here\'s another date type.', 'd/m/Y');
die;

?>