<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class HomeController implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Request $request)
    {
        $templateName = "index.html.twig";
        $container = $this->getContainer();
        $taskPersistence = $container->get('task_persistence');
        $showTasks = $taskPersistence->showTableToDo();
        $response = new WebResponse($templateName, $showTasks);  
        return $response;
    }

    public function getContainer()
    {
        return $this->container;
    }
}
