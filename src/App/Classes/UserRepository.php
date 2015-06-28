<?php
namespace App\Classes;

use Fw\Component\Database\Database;

interface UserRespository
{
    public function insertUser();
    public function deleteUser();
    public function createTableUser();
    public function showTableUser();
}
