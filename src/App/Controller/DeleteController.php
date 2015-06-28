<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Database\Database;

final class DeleteController implements Controller
{
    public function __invoke(Request $request)
    {
        $templateName = "delete.html.twig";
        $parameters = $request->getMethod();

        $username = $parameters["get"]["username"];

        $response = new WebResponse($templateName, $parameters["get"]);
            
        return $response;
    }
}
