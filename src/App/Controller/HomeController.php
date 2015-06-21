<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;

final class HomeController implements Controller
{
    public function __invoke(Request $request)
    {
        //$dataFromController = "Invoked HomeController";
        //$response = new WebResponse($dataFromController);

        $firstname = "gabriel";
        $lastname = "guzman";
        $response = new JsonResponse(
                                    array( 
                                        'firstName' => $firstname,
                                        'lastName' => $lastname 
                                    ) 
                                );
        return $response;
    }
}
