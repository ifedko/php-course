<?php

$baseApplicationDir = $_SERVER['DOCUMENT_ROOT'] . '/..';
$application = require $baseApplicationDir . '/src/app/app.php';
$request = $_REQUEST;
$application->run($request);
