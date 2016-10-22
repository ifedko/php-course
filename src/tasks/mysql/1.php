<?php
$dbHostname = 'localhost';
$dbUsername = 'ifedko';
$dbPassword = 'ifedko';
$database = 'publications';

$mysqli = new mysqli($dbHostname, $dbUsername, $dbPassword, $database);
if (mysqli_connect_errno($mysqli)) {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

$sql = <<<SQL
    SELECT *
    FROM classics
SQL;
$res = $mysqli->query($sql);
$rows = [];
while ($row = $res->fetch_assoc()) {
	$rows[] = var_export($row, true);
}

$description = 'Simple example with mysqli';
$inputData = '';
$result = implode('<br>', $rows);