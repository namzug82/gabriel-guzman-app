<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Container\Container;

define("SERVICES", __DIR__ . '/../src/App/Resources/config/services/yaml/services.yml');

$container = new Container(SERVICES);
$app = new Application;
$app->setContainer($container);
$app->run();
