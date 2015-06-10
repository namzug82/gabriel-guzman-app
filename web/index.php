<?php

require '../vendor/autoload.php';

use Fw\Application;
//use Fw\YmlRouting;

$app = new Application;
 
// $routing = new YmlROuting;
// $app->setRoutingComponent($routing);

$app->run();