<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\YamlParser;
use Fw\Component\Routing\GenericParser;
use Symfony\Component\Yaml\Parser;

define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/../src/App/Resources/config/routing/yaml/routing.yml');

$app = new Application;

$parser = new Parser;
$yaml = new YamlParser($parser, ROOT);

$route = new GenericParser($yaml);
var_dump($route->parseRoutes());

$app->run();

