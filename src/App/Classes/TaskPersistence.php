<?php
namespace App\Classes;

use Fw\Component\Database\Database;

final class TaskPersistence implements TaskRepository
{
    private $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
        $this->createTableToDo();
    }

    public function createTableToDo()
    {
        $statement = $this->database->prepare(   
            "CREATE TABLE IF NOT EXISTS " . 
                "to_do " . 
                "(" .
                "id INT(10) PRIMARY KEY AUTO_INCREMENT, " .
                "task VARCHAR(255) NOT NULL " .
                ")" .
            ";" 
        );
        $statement->execute();
    }

    public function showTableToDo()
    {
        $statement = $this->database->prepare(   
            "SELECT " . 
                "* " . 
            "FROM " .
                "to_do " .
            "GROUP BY " .
                "task" .
            ";" 
        );
        $statement->execute();
        return $statement->fetchAll();
    }

    public function insertTask($task)
    {
        $statement = $this->database->prepare(  
            "INSERT INTO " .
                "to_do " .
                "(" .
                "task" . 
                ") " .
            "VALUES " .
                "(" .
                ":task " . 
                ")" .
            ";"
        );
        $statement->bindParam(':task', $task, \PDO::PARAM_STR);
        $statement->execute();
    }

    public function deleteTask($task)
    {
        $statement = $this->database->prepare(  
            "DELETE FROM " .
                "to_do " .
            "WHERE " .
                "task = '" . $task . "'" . 
            ";"
        );        
        $statement->execute();
    }
}
