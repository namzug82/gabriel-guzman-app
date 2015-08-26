<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class Home implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Array $parameters = null)
    {
        $templateName = "index.html.twig";
        $taskPersistence = $this->container->get('task_persistence');
        $showTasks = $taskPersistence->showTableToDo();
        $response = new WebResponse($templateName, $showTasks);  
        return $response;
    }
}
