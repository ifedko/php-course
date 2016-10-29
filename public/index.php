<?php
// include library of functions and classes
$baseApplicationDir = $_SERVER['DOCUMENT_ROOT'] . '/..';
require_once $baseApplicationDir . '/src/app/bootstrap.php';

$pathToConfig = $baseApplicationDir . '/src/app/config/config.php';

$request = $_REQUEST;
$application = new Application($baseApplicationDir);
$application->build($pathToConfig)->run($request);
