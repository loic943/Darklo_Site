<?php

namespace App\Tests\Fonctionnels;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AboutTest extends WebTestCase
{
    public function testAfficheAPropos(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/a-propos');

        $this->assertResponseIsSuccessful();
    }
}
