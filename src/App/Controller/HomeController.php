<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Container\Container;
use App\Classes\UserPersistence;

final class HomeController implements Controller
{
    private $container;

    public function __construct(Container $services)
    {
        $this->container = $services;
    }

    public function __invoke(Request $request)
    {
        $templateName = "index.html.twig";
        $container = $this->getContainer();
        $userPersistence = $container->get('user_persistence');
        $showUsers = $userPersistence->showTableUser();
        $response = new WebResponse($templateName, $showUsers);
            
        return $response;
    }

    public getContainer()
    {
        return $this->container;
    }
}
