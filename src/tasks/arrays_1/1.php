<?php
function sayHelloWorld($count = 1)
{
	$result = '';
	for ($i = 0; $i < $count; $i++) {
		$result .= 'Hello World!<br>';
	}
	return $result;
}

function taskFunction(array $data)
{
	$countRows = (isset($data['count_rows'])) ? $data['count_rows'] : 5;
	return sayHelloWorld($countRows);
}

// $description = 'Вывести 1 раз Hello World.';
// $inputData = '$count = 1';
// $result = sayHelloWorld(1);
