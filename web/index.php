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

//$app = new Application;

$parser = new Parser;
$yaml = new YamlParser($parser, ROOT);
$route = new GenericParser($yaml);

$router = new Router($route);

$request = new Request;
$requestPath = $request->getPath();
$requestSubRoute = $router->getSubRouteName($requestPath);

$dispatcher = new Dispatcher;
$controller = $dispatcher->getController($requestSubRoute);

$invokeResponse = new $controller();
$response = $invokeResponse($request);

if ($response->getData() instanceof JsonResponse) {
    $view = new JsonView();
} else {
    $view = new TwigView();
}
$view->render($response);


$host = "localhost"; 
$user = "root"; 
$password = "1234"; 
$db = "fw_db"; 

$database = new PDO($db, $host, $user, $password);
// $statement = $database->prepare('SELECT * FROM users WHERE username = :username AND password = :password');
// $statement->bindParam(':username', $username, \PDO::PARAM_STR);
// $statement->bindParam(':password', $password, \PDO::PARAM_STR);
// $statement->execute();

// $username = 'manolo';
// $password = '1234';
// $statement = $database->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
// $statement->bindParam(':username', $username, \PDO::PARAM_STR);
// $statement->bindParam(':password', $password, \PDO::PARAM_STR);
// $statement->execute();

// return $statement->fetch();

//$app->run();
