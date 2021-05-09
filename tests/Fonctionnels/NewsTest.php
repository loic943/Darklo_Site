<?php

namespace App\Tests\Fonctionnels;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class NewsTest extends WebTestCase
{
    public function testAfficheNews(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/news/Titre-test-slug/1');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Titre Test');
    }
}
