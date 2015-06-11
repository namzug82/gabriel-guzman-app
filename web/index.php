<?php
// Enable errors to see when something fails.
error_reporting( E_ALL | E_STRICT );
ini_set( "display_errors", "on" );

require '../vendor/autoload.php';

//define("ROOT", $_SERVER['DOCUMENT_ROOT'] . '/../src/App/Component/Routing/Yaml/routing.yml');

use Fw\Application;
use Fw\Component\Routing\YamlParser;
use Fw\Component\Routing\GenericParser;
use Symfony\Component\Yaml\Parser;

$app = new Application;
$yaml = new YamlParser;
//$yaml = new Parser;
$route = new GenericParser($yaml);
$route->parseRoutes();
//$app->setRouting($routing);
$app->run();

// $b = new PDFBook();
// $r = new EBookReader($b);