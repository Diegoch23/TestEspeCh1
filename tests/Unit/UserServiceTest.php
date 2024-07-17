<?php

use PHPUnit\Framework\TestCase;
use App\UserService;
use App\Database;

class UserServiceTest extends TestCase
{
    public function testGetUser()
    {
        $dbMock = $this->createMock(Database::class);
        $dbMock->method('find')
               ->willReturn([
                   'id' => 5,
                   'name' => 'Diego Chancusig Simbaña',
                   'email' => 'diegochancusisimbana@gmail.com'
               ]);
        
        $service = new UserService($dbMock);
        
        $user = $service->getUser(1);
        
        $this->assertEquals(5, $user['id']);
        $this->assertEquals('Diego Chancusig Simbaña', $user['name']);
        $this->assertEquals('diegochancusisimbana@gmail.com', $user['email']);
    }
}