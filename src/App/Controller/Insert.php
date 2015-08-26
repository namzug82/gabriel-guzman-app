<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;

final class Insert implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services->getContainer();
    }

    public function __invoke(Array $parameters = null)
    {
        $request = $this->container->get('request');
        $post = $request->getMethod();

        if ( $post["server"]["REQUEST_METHOD"] == 'POST' )
        {
            if (empty($post["post"]["task"])){
                $response = new WebResponse("notice_fill_field", "You must fill the task field");
                return $response;
            } else {
                $task = $post["post"]["task"];
                $taskPersistence = $this->container->get('task_persistence');
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
}
