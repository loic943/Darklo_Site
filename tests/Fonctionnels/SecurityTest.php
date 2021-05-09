<?php

namespace App\Tests\Fonctionnels;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class SecurityTest extends WebTestCase
{
    public function testVisitingWhileLoggedIn()
    {
        $client = static::createClient();
        $crawler = $client->request('GET', '/login');

        $BoutonEnvoyer = $crawler->selectButton('Valider');
        $form = $BoutonEnvoyer->form();

        $form = $BoutonEnvoyer->form([
            'email' => 'admin@darklo.fr',
            'password' => 'pass',
        ]);

        $client->submit($form);

        // test e.g. the profile page
        $client->request('GET', '/login');
        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('', 'Vous êtes connecté en tant que admin@darklo.fr');
    }
}
