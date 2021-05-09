<?php

namespace App\Tests\Fonctionnels;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class CategorieTest extends WebTestCase
{
    public function testAfficheCategorie(): void
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/categorie/categorie-test');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Bienvenue dans la catégorie "categorieTest" !');
    }
}
