<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Container\Container;
use Fw\Component\Routing\YamlParser;
use Fw\Component\Routing\PhpParser;
use Fw\Component\Routing\JsonParser;
use Fw\Component\Routing\GenericParser;
use Fw\Component\Routing\Router;
use Fw\Component\Request\Request;
use Fw\Component\Dispatcher\Dispatcher;
use Fw\Component\View\JsonView;
use Fw\Component\View\TwigView;
use Fw\Component\Database\PDO;
use Symfony\Component\Yaml\Parser;

define("ROOT", __DIR__ . '/../src/App/Resources/config/routing/yaml/routing.yml');
//define("ROOT", __DIR__ . '/../src/App/Resources/config/routing/php/routing.php');
//define("ROOT", __DIR__ . '/../src/App/Resources/config/routing/json/routing.json');
define("TEMPLATES", __DIR__ . '/../src/App/Resources/views');
define("SERVICES", __DIR__ . '/../src/App/Resources/config/services/yaml/services.yml');

$services = new Container(SERVICES);
$servicesContainer = $services->getContainer();

$parser = new Parser;
$yaml = new YamlParser($parser, ROOT);
//$php = new PhpParser(ROOT);
//$json = new JsonParser(ROOT);

$route = new GenericParser($yaml);
//$route = new GenericParser($php);
//$route = new GenericParser($json);

$router = new Router($route);
$request = new Request;
$dispatcher = new Dispatcher;
$twig = new TwigView(TEMPLATES);

$database = $servicesContainer->get('pdo');

$app = new Application;
$app->setRouter($router);
$app->setRequest($request);
$app->setDispatcher($dispatcher);
$app->setWebView($twig);
$app->setDatabase($database);
$app->setContainer($services);
$app->run();
