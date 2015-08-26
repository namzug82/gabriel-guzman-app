<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class InsertForm implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Array $parameters = null)
    {
        $templateName = "insert_form.html.twig";
        $response = new WebResponse($templateName, null);
            
        return $response;
    }
}
