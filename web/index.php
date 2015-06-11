<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\;

$app = new Application;
 
$routing = new YamlParser;
$app->setRouting($routing);

$app->run();