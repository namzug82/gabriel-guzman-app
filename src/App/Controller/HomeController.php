<?php
namespace App\Controller;

use Fw\Component\Controller\Controller;
use Fw\Component\Request\Request;
use Fw\Component\Response\JsonResponse;
use Fw\Component\Response\WebResponse;
use Fw\Component\Database\Database;

final class HomeController implements Controller
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function __invoke(Request $request)
    {
        $templateName = "index.html.twig";
        $parameters = $request->getMethod();

        $tableBuilder = $this->database->prepare("CREATE TABLE IF NOT EXISTS " . 
                            "users " . 
                            "(" .
                            "id INT(10) PRIMARY KEY AUTO_INCREMENT, " .
                            "username VARCHAR(255) NOT NULL, " .
                            "password VARCHAR(255) NOT NULL" .
                            ");" 
                        );
        $tableBuilder->execute();

        $username = $parameters["get"]["username"];
        $password = $parameters["get"]["password"];
        $statement = $this->database->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->bindParam(':password', $password, \PDO::PARAM_STR);
        $statement->execute();

        $response = new WebResponse($templateName, $parameters["get"]);
            
        return $response;
    }
}
