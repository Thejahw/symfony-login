<?php


use PHPUnit\Framework\TestCase;
use App\Controller\LoginController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class loginTest extends WebTestCase
{
    // public function testgetEmployeeSuccess()
    // {
    //     $login = new LoginController;
    //     $result = $login->getEmployee(1);
    //     $expected = "{\"id\":1,\"firstname\":\"David\",\"lastname\":\"peter\",\"address\":\"No:32,st.peters road,colombia\"}";

    //     console.log($result);
    //     console.log($expected);
    //     // assert that your calculator added the numbers correctly!
    //     $this->assertEquals($expected, $result->getResponse()->getStatusCode());
    // }


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

        $client->request('POST', '/login',['username'=> "ShanWagner", 'password'=> "Pass123"]);
        // $b->post('/login', array('username'=> "ShanWagner", 'password'=> "Pass123")); 
        $this->assertStringContainsString('peter', $client->getResponse()->getContent());

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        
        
    }

    // test a unsuccessfull login
    public function testLoginNOtSuccess()
    {
        $client = static::createClient();

        $client->request('POST', '/login',['username'=> "abs", 'password'=> "Pass123"]);

        $this->assertEquals(204, $client->getResponse()->getStatusCode());    
    }

    
}