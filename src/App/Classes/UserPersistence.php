<?php
namespace App\Classes;

use Fw\Component\Database\Database;

final class UserPersistence implements UserRespository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function createTableUser()
    {
        $statement = $this->database->prepare(   
            "CREATE TABLE IF NOT EXISTS " . 
                "user " . 
                "(" .
                "id INT(10) PRIMARY KEY AUTO_INCREMENT, " .
                "username VARCHAR(255) NOT NULL, " .
                "password VARCHAR(255) NOT NULL" .
                ")" .
            ";" 
        );
        $statement->execute();
    }

    public function showTableUser()
    {
        $statement = $this->database->prepare(   
            "SELECT " . 
                "* " . 
            "FROM " .
                "user " .
            "GROUP BY " .
                "username" .
            ";" 
        );
        $statement->execute();
        return $statement->fetchAll();
    }

    public function insertUser()
    {
        $statement = $this->database->prepare(  
            "INSERT INTO " .
                "user " .
                "(" .
                "username," . 
                "password" .
                ") " .
            "VALUES " .
                "(" .
                ":username, " . 
                ":password" .
                ")" .
            ";"
        );
        $statement->bindParam(':username', $username, \PDO::PARAM_STR);
        $statement->bindParam(':password', $password, \PDO::PARAM_STR);
        $statement->execute();
    }

    public function deleteUser()
    {
        $statement = $this->database->prepare(  
            "DELETE FROM " .
                "user " .
            "WHERE " .
                "username = '" . $username . "'" . 
            ";"
        );        
        $statement->execute();
    }
}
