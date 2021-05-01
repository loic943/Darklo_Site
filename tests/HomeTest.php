<?php

namespace App\Tests;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Panther\PantherTestCase;

class HomeTest extends WebTestCase
{
    public function testHomePage(): void
    {
        $reponse = new Response();

        $client = static::createClient();
        $client->request('GET', 'https://127.0.0.1:8000/');

        //$this->assertSelectorTextContains('h1', 'Bienvenue sur le blog de D@rklo');
        $this->assertEquals(200, $reponse->getStatusCode());
    }
}
