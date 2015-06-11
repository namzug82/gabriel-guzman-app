<?php

require '../vendor/autoload.php';

use Fw\Application;
use Fw\Component\Routing\;

$app = new Application;
 
$routing = new YamlParser;
$app->setRouting($routing);

$app->run();