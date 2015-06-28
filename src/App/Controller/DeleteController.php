<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class DeleteController implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Request $request)
    {
        $templateName = "delete.html.twig";
        $parameters = $request->getMethod();
        $task = $parameters["get"]["task"];
        $container = $this->getContainer();
        $taskPersistence = $container->get('task_persistence');
        $taskPersistence->deleteTask($task);
        $response = new WebResponse($templateName, null);
            
        return $response;
    }

    public function getContainer()
    {
        return $this->container;
    }
}
