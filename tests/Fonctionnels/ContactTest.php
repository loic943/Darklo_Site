<?php

namespace App\Tests\Fonctionnels;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class ContactTest extends WebTestCase
{
    public function testAfficheContact(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/contact');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Formulaire de contact');
    }
}
