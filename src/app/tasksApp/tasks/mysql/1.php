<?php
function taskCreateDbConnection($dbHostname, $dbUsername, $dbPassword, $database)
{
	$mysqli = new mysqli($dbHostname, $dbUsername, $dbPassword, $database);
	if (mysqli_connect_errno($mysqli)) {
	    echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	return $mysqli;
}

function getClassics($dbConnection)
{
	$sql = <<<SQL
    SELECT *
    FROM classics
SQL;
	$res = $dbConnection->query($sql);
	$rows = [];
	while ($row = $res->fetch_assoc()) {
		$rows[] = var_export($row, true);
	}
	return $rows;
}

function taskFunction($data)
{
	$dbHostname = 'localhost';
	$dbUsername = 'ifedko';
	$dbPassword = 'ifedko';
	$database = 'publications';
	$dbConnection = taskCreateDbConnection($dbHostname, $dbUsername, $dbPassword, $database);
	$result = getClassics($dbConnection);
	return $result;
}

// $description = 'Simple example with mysqli';
// $inputData = '';
// $result = implode('<br>', $rows);