<?php
function sayHelloWorld($count = 1)
{
	$result = '';
	for ($i = 0; $i < $count; $i++) {
		$result .= 'Hello World!<br>';
	}
	return $result;
}

$description = 'Вывести 1 раз Hello World.';
$inputData = '$count = 1';
$result = sayHelloWorld(1);
