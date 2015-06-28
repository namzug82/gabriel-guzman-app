<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Database\Database;

final class InsertController implements Controller
{
    public function __invoke(Request $request)
    {
        $templateName = "insert.html.twig";
        $parameters = $request->getMethod();

        $username = $parameters["post"]["username"];
        $password = $parameters["post"]["password"];
        

        $response = new WebResponse($templateName, $parameters["post"]);
            
        return $response;
    }
}
