<?php

require_once __DIR__ . '/../../library/index.php';

function getClassics($dbConnection)
{
	if (!$dbConnection) {
		return [];
	}
	$statement = $dbConnection->query('SELECT * FROM classics');
	$statement->setFetchMode(PDO::FETCH_ASSOC);
	$rows = $statement->fetchAll();
	return var_export($rows, true);
}


function taskFunction($data, $dbConnection)
{
	// $pathToConfig = __DIR__ . '/../../config/config.php';
	// $config = new Config($pathToConfig);
	// $dbParameters = $config->get('db');
	// $dbConnection = createDbConnection($dbParameters);
	$classics = getClassics($dbConnection);
	return $classics;
}
