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
use Symfony\Component\Yaml\Parser;

define("ROOT", __DIR__ . '/../src/App/Resources/config/routing/yaml/routing.yml');

//$app = new Application;

$parser = new Parser;
$yaml = new YamlParser($parser, ROOT);
$route = new GenericParser($yaml);

$router = new Router($route);

$request = new Request();
$requestPath = $request->getPath();
$requestSubRoute = $router->getSubRouteName($requestPath);

$dispatcher = new Dispatcher();
$controller = $dispatcher->getController($requestSubRoute);

$invokeResponse = new $controller();
$response = $invokeResponse($request);
$dataResponse = $response->getData();

if ($dataResponse instanceof JsonResponse) {
    $response = new JsonView();
} else {
    $response = new TwigView();
}
$response->render($dataResponse);

//$app->run();
