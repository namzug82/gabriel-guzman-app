<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\YamlParser;
use Fw\Component\Routing\GenericParser;
use Fw\Component\Routing\Router;
use Fw\Component\Dispatcher\Dispatcher;
use Symfony\Component\Yaml\Parser;

define("ROOT", __DIR__ . '/../src/App/Resources/config/routing/yaml/routing.yml');

$app = new Application;

$parser = new Parser;
$yaml = new YamlParser($parser, ROOT);

$route = new GenericParser($yaml);

$router = new Router($route);
$routeName = $router->getRouteName();
$subRouteName = $router->getSubRouteName($routeName);

$dispatcher = new Dispatcher();
$object = $dispatcher->getController($subRouteName);
new $object;

//$app->run();

