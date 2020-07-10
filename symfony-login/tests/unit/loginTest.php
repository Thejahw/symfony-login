<?php


use PHPUnit\Framework\TestCase;
use App\Controller\LoginController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class loginTest extends WebTestCase
{
// test a successfull employee data extraction
    public function testGetEmployeeSuccess()
    {
        $client = static::createClient();

        $client->request('GET', '/employee/1');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertStringContainsString('David', $client->getResponse()->getContent());
        $this->assertStringContainsString('peter', $client->getResponse()->getContent());   
    }

    // test a successfull login
    public function testLoginSuccess()
    {
        $client = static::createClient();

        $client->request('POST', '/login',['username'=> "ShanWagner", 'password'=> md5("Pass123")]);
        $this->assertEquals(200, $client->getResponse()->getStatusCode());
    }

    // test a unsuccessfull login
    public function testLoginNOtSuccess()
    {
        $client = static::createClient();

        $client->request('POST', '/login',['username'=> "abs", 'password'=> md5("Pass123")]);//incorrect username
        $client->request('POST', '/login',['username'=> "ShanWagner", 'password'=> md5("asdf")]);//incorrect password
        $this->assertEquals(204, $client->getResponse()->getStatusCode()); //status code 204 null responce/ no content   
    }

    
}