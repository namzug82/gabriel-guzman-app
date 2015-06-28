<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class InsertController implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Request $request)
    {

        $parameters = $request->getMethod();

        if ( $parameters["server"]["REQUEST_METHOD"] == 'POST' )
        {
            if (empty($parameters["post"]["task"])){
                $response = new WebResponse("notice_fill_field", "You must fill the task field");
                return $response;
            } else {
                $task = $parameters["post"]["task"];
                $container = $this->getContainer();
                $taskPersistence = $container->get('task_persistence');
                $taskPersistence->insertTask($task);
                $templateName = "insert.html.twig";
            }
        }
        else {
            $templateName = "insert_form.html.twig";
        }
        $response = new WebResponse($templateName, null);
        return $response;
    }

    public function getContainer()
    {
        return $this->container;
    }
}
