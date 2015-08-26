<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class Delete implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Array $parameters = null)
    {
        $templateName = "delete.html.twig";
        $request = $this->container->get('request');
        $get = $request->getMethod();
        $task = $get["get"]["task"];
        $taskPersistence = $this->container->get('task_persistence');
        $taskPersistence->deleteTask($task);
        $response = new WebResponse($templateName, null);
            
        return $response;
    }
}
