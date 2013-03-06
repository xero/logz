<?php

echo('<h1>logz test</h1><ul>');

require_once('../src/logz.php');
$logz = new logz(getcwd().'/logs/', 'test.log');
echo "<li>log created</li>";

$logz->write('testing testing 123...');
echo "<li>wrote test data</li>";

$logz->write('here\'s another date type.', 'd/m/Y');
echo "<li>wrote test data with alternative date format</li>";

echo "<li>log count: ".$logz->count()."</li>";

$logz->clear();
echo "<li>log cleared</li>";

echo "<li>log count: ".$logz->count()."</li>";

$logz->write('this is a fake log message.');
echo "<li>wrote more test data</li>";

$logz->write('here is another log message.');
echo "<li>wrote another test data log</li>";

$logz->write('yet another log message.');
echo "<li>wrote yet another test data log</li>";

echo "<li>read 1st line:<br/><strong>".$logz->read(1)."</strong></li>";

echo "<li>read last line:<br/><strong>".$logz->read($logz->count())."</strong></li>";

echo "<li>log count: ".$logz->count()."</li>";

$logz->destroy();
echo "<li>log destroyed</li></ul>";

die;

?>