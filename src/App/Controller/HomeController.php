<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
//use Fw\Component\Response;

final class HomeController implements Controller
{
    public function __invoke(Request $request)
    {
        echo "Invoked HomeController";
        // $response = new Response($info);
        // return $response;
    }
}
