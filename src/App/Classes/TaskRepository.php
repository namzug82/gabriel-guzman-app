<?php
namespace App\Classes;

interface TaskRepository
{
    public function insertTask($task);
    public function deleteTask($task);
    public function createTableToDo();
    public function showTableToDo();
}
