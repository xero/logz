<?php

echo('<h1>logz test</h1><ul>');

require_once('../src/logz.php');
$logz = new logz(getcwd().'/logs/', 'test.log');
echo "<li>log created</li>";

$logz->write('testing testing 123...');
echo "<li>wrote test data</li>";

$logz->write('here\'s another date type.', 'd/m/Y');
echo "<li>wrote test data with alternative date format</li>";

$logz->clear();
echo "<li>log cleared</li>";

$logz->write('this is a fake log message.');
echo "<li>wrote more test data</li>";

$logz->destroy();
echo "<li>log destroyed</li></ul>";
die;

?>