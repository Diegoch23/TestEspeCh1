<?php 
namespace App;

class UserService
{
    protected $database;

    public function __construct(Database $database)
    {
        $this->database = $database;
    }

    public function getUser(int $id): array
    {
        return $this->database->find($id);
    }
}
