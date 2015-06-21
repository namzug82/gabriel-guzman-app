<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\Response;

final class HomeController implements Controller
{
    public function __invoke(Request $request)
    {
        // echo "Invoked HomeController";
        $dataFromController = "Invoked HomeController";
        
        // public function indexAction($firstname, $lastname)
        // {
        //     return new JsonResponse( 
        //         array( 
        //             'firstName' => $firstname,
        //             'lastName' => $lastname 
        //         ) 
        //     );
        // }

        $response = new Response($dataFromController);
        return $response;
    }
}
