<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\YamlParser;
use Fw\Component\Routing\GenericParser;
use Fw\Component\Routing\Router;
use Fw\Component\Request\Request;
use Fw\Component\Dispatcher\Dispatcher;
use Fw\Component\View\JsonView;
use Fw\Component\View\TwigView;
use Fw\Component\Database\PDO;
use Symfony\Component\Yaml\Parser;

define("ROOT", __DIR__ . '/../src/App/Resources/config/routing/yaml/routing.yml');
define("TEMPLATES", __DIR__ . '/../src/App/Resources/views');

$parser = new Parser;
$yaml = new YamlParser($parser, ROOT);
$route = new GenericParser($yaml);
$router = new Router($route);
$request = new Request;
$dispatcher = new Dispatcher;
$twig = new TwigView(TEMPLATES);

$host = "localhost"; 
$user = "root"; 
$password = "1234"; 
$db = "fw_db"; 
$database = new PDO($db, $host, $user, $password);

$app = new Application;
$app->setRouter($router);
$app->setRequest($request);
$app->setDispatcher($dispatcher);
$app->setWebView($twig);
$app->setDatabase($database);
$app->run();
