<?php

function createDbConnection($dbParameters)
{
	try {
		$dsn = $dbParameters['dsn'];
		$username = $dbParameters['username'];
		$password = $dbParameters['password'];

		$dbConnection = new PDO($dsn, $username, $password);
	} catch (PDOException $exception) {
		return null;
	}
	return $dbConnection;
}

function getClassics($dbConnection)
{
	$statement = $dbConnection->query('SELECT * FROM classics');
	$statement->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $statement->fetchAll();
	return var_export($rows, true);
}


function taskFunction($data)
{
	$pathToConfig = __DIR__ . '/../../config/config.php';
	$config = new Config($pathToConfig);
	$dbParameters = $config->get('db');
	$dbConnection = createDbConnection($dbParameters);
	$classics = getClassics($dbConnection);
	return $classics;
}
