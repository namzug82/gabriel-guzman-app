<?php
array(
    "home" => [
        "path" => "/",
        "controller" => "App\Controller\Home"
        "allowed_methods" => ["get"]
    ],
    "some-page" => [
        "path" => "some-page",
        "controller" => "App\Controller\Home"
        "allowed_methods" => ["get"]
    ],
    "some-{variable}-page" => [
        "path" => "some/{variable}/page",
        "controller" => "App\Controller\Home"
        "allowed_methods" => ["get"]
    ]
)
?>