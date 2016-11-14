<?php
require_once __DIR__ . '/bootstrap.php';

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

$pathToConfig = __DIR__ . '/config/config.php';

$application = new Application($baseApplicationDir);
$application->build($pathToConfig);

$container = $application->getContainer();
$config = $container->get('config');

$dbConnection = createDbConnection($config->get('db'));
$container->set('dbConnection', $dbConnection);

$authentication = new Authentication($dbConnection);
$container->set('authentication', $authentication);

return $application;
