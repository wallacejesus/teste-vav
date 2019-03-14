<?php
require 'vendor/autoload.php';
require 'lib/Slim/Slim.php';
\Slim\Slim::registerAutoloader();
$app = new \Slim\Slim();
require 'routes.php';
$app->run();
?>