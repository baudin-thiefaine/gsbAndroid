<?php

namespace AndroidBundle\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    public function testIndex()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertContains('Hello World', $client->getResponse()->getContent());
    }
    
    public function testGetLeVisi(){
        
    }
    public function indexActionTest(){
       
        $android = new \AndroidBundle\Controller\AndroidController();
        $result = $android->indexAction();

        // assert that your calculator added the numbers correctly!
        $this->assertEquals(42, $result);
    }
    
   
    
}
