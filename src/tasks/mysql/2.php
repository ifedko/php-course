<?php
// some code
try {
	$dsn = 'mysql:host=localhost;dbname=publications';
	$username = 'ifedko';
	$password = 'ifedko';
	$db = new PDO($dsn, $username, $password);
	$statement = $db->query('SELECT * FROM classics');
	$statement->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $statement->fetchAll();
	var_dump($rows);
} catch (PDOException $exception) {
	echo 'Error! Message: ' . $exception->getMessage()
		. ' Code: ' . $exception->getCode();
}

// some code

$description = '';
$inputData = '';
$result = '';
