<?php
namespace App\Controller;

use Fw\Component\Controller;
use Fw\Component\Request;
use Fw\Component\Response;

final class HomeController implements Controller
{
    public function __invoke(Request $request)
    {
        echo "HOME: Instanciación del framework";
        // $response = new Response($info);
        // return $response;
    }
}