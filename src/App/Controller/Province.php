<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class Province implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Array $parameters)
    {
        $templateName = "province.html.twig";
        $name = $parameters['name'];
        $response = new WebResponse($templateName, $name);  
        return $response;
    }
}
