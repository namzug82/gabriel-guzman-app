<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;

final class HomeController implements Controller
{
    public function __invoke(Request $request)
    {
        $templateName = "index.html.twig";
        $parameters = $request->getMethod();
        $response = new WebResponse($templateName, $parameters["get"]);
            
        return $response;
    }
}
